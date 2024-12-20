<?php

namespace App\Console\Commands;

use App\Enums\AddonType;
use App\Enums\LinkType;
use App\Models\Addon;
use App\Models\Legacy\Xtra;
use App\Models\Legacy\XtraFile;
use App\Models\User;
use App\Models\Version;
use Illuminate\Console\Command;

class MigrateAddons extends Command
{
    protected $signature = 'one-time:migrate-addons';

    protected $description = 'Migrate add-ons from the old database';

    public function handle()
    {
        $this->error('Migrating add-ons is a one-time command that cannot be run again.');

        return Command::INVALID;

        activity()->disableLogging();

        $xtras = Xtra::withTrashed()->get();

        $bar = $this->output->createProgressBar(count($xtras));

        $xtras->each(function (Xtra $xtra) use ($bar) {
            $addon = Addon::where('legacy_id', $xtra->id)->first();
            $user = User::where('legacy_id', $xtra->user_id)->first();

            if ($addon) {
                $addon->forceFill([
                    'name' => $xtra->name,
                    'description' => $xtra->desc,
                    'user_id' => $user->id,
                    'type' => $this->getType($xtra->type_id),
                    'published' => $xtra->status == 1,
                    'install_instructions' => $xtra->metadata->installation,
                    'links' => $this->setLinksFromXtra($xtra),
                    'legacy_id' => $xtra->id,
                    'created_at' => $xtra->created_at,
                    'updated_at' => $xtra->updated_at,
                    'deleted_at' => $xtra->deleted_at,
                ])->save();
            } else {
                $addon = new Addon;

                $addon->name = $xtra->name;
                $addon->description = $xtra->desc;
                $addon->user_id = $user->id;
                $addon->type = $this->getType($xtra->type_id);
                $addon->published = $xtra->status == 1;
                $addon->install_instructions = $xtra->metadata->installation;
                $addon->links = $this->setLinksFromXtra($xtra);
                $addon->legacy_id = $xtra->id;
                $addon->created_at = $xtra->created_at;
                $addon->updated_at = $xtra->updated_at;
                $addon->deleted_at = $xtra->deleted_at;

                $addon->save();
            }

            $addon->products()->sync($xtra->product_id);

            if ($xtra->metadata->image1 && file_exists($imagePath1 = public_path('xtras/'.$xtra->metadata->image1))) {
                $addon->addMedia($imagePath1)
                    ->preservingOriginal()
                    ->toMediaCollection('primary-preview', 'r2-addons');
            }

            if ($xtra->metadata->image2 && file_exists($imagePath2 = public_path('xtras/'.$xtra->metadata->image2))) {
                $addon->addMedia($imagePath2)
                    ->preservingOriginal()
                    ->toMediaCollection('additional-previews', 'r2-addons');
            }

            if ($xtra->metadata->image3 && file_exists($imagePath3 = public_path('xtras/'.$xtra->metadata->image3))) {
                $addon->addMedia($imagePath3)
                    ->preservingOriginal()
                    ->toMediaCollection('additional-previews', 'r2-addons');
            }

            $xtra->files->each(function (XtraFile $file) use ($xtra) {
                Version::unguard();

                Addon::withoutTouching(function () use ($file, $xtra) {
                    $addon = Addon::where('legacy_id', $file->item_id)->first();

                    $version = Version::updateOrCreate(
                        [
                            'addon_id' => $addon->id,
                            'version' => $file->version,
                            'legacy_id' => $file->id,
                        ],
                        [
                            'published' => true,
                            'release_notes' => $xtra->metadata->history,
                            'created_at' => $file->created_at,
                            'updated_at' => $file->updated_at,
                        ]
                    );

                    $version->product()->sync($xtra->product_id);

                    if (file_exists($downloadFile = public_path('xtras/'.$file->filename))) {
                        $version->addMedia($downloadFile)
                            ->withCustomProperties(['user_id' => $addon->user_id])
                            ->preservingOriginal()
                            ->toMediaCollection('downloads', 'r2-addons');
                    }

                    $addon->versions()->save($version);
                });

                Version::reguard();
            });

            $bar->advance();
        });

        $bar->finish();

        $this->newLine();

        $this->info(count($xtras).' add-ons migrated');

        activity()->enableLogging();

        return Command::SUCCESS;
    }

    protected function getType(int $typeId)
    {
        return [
            1 => AddonType::Theme,
            2 => AddonType::Rank,
            3 => AddonType::Extension,
        ][$typeId];
    }

    protected function setLinksFromXtra(Xtra $xtra): ?array
    {
        if (is_null($xtra->support)) {
            return null;
        }

        $support = str($xtra->support);

        if ($support->contains('github')) {
            return [
                ['type' => LinkType::Github, 'value' => $support],
            ];
        }

        if ($support->contains('@') || $support->contains('anodyne-productions')) {
            return null;
        }

        return [
            ['type' => LinkType::Website, 'value' => $support],
        ];
    }
}
