<?php

namespace App\Filament\Resources\AddonResource\Widgets;

use Domain\Exchange\Models\Addon;
use Filament\Widgets\BarChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class TotalDownloadsChart extends BarChartWidget
{
    protected static ?string $heading = 'Total Downloads Per Month';

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $data = Trend::query(
            Addon::when(
                auth()->user()->isUser,
                fn ($query) => $query->where('user_id', auth()->id())
            )
        )
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Add-on downloads',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            // 'labels' => $data->map(fn (TrendValue $value) => $value->date),
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }
}
