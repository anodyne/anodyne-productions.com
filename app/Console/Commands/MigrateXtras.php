<?php

namespace App\Console\Commands;

use App\Enums\AddonType;
use App\Models\Addon;
use App\Models\Legacy\Xtra;
use App\Models\Legacy\XtraFile;
use App\Models\User;
use App\Models\Version;
use Illuminate\Console\Command;

class MigrateXtras extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anodyne:migrate-xtras';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate Xtras from the old database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
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
                    'legacy_id' => $xtra->id,
                    'created_at' => $xtra->created_at,
                    'updated_at' => $xtra->updated_at,
                    'deleted_at' => $xtra->deleted_at,
                ])->save();
            } else {
                $addon = new Addon();

                $addon->name = $xtra->name;
                $addon->description = $xtra->desc;
                $addon->user_id = $user->id;
                $addon->type = $this->getType($xtra->type_id);
                $addon->published = $xtra->status == 1;
                $addon->install_instructions = $xtra->metadata->installation;
                $addon->legacy_id = $xtra->id;
                $addon->created_at = $xtra->created_at;
                $addon->updated_at = $xtra->updated_at;
                $addon->deleted_at = $xtra->deleted_at;

                $addon->save();
            }

            $addon->products()->sync($xtra->product_id);

            // $addon->addMediaFromDisk($xtra->metadata->image1, 'r2')->toMediaCollection('primary-preview');
            // $addon->addMediaFromDisk($xtra->metadata->image2, 'r2')->toMediaCollection('additional-previews');
            // $addon->addMediaFromDisk($xtra->metadata->image3, 'r2')->toMediaCollection('additional-previews');

            $xtra->files->each(function (XtraFile $file) use ($xtra) {
                Version::unguarded(function () use ($file, $xtra) {
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

                    // $version->addMediaFromDisk($file->filename, 'r2')->toMediaCollection('downloads');

                    $addon->versions()->save($version);
                });
            });

            $bar->advance();
        });

        $bar->finish();

        $this->newLine();

        $this->info(count($xtras).' add-ons migrated');

        return Command::SUCCESS;
    }

    protected function getType(int $typeId)
    {
        return [
            1 => AddonType::theme,
            2 => AddonType::rank,
            3 => AddonType::extension,
        ][$typeId];
    }
}
