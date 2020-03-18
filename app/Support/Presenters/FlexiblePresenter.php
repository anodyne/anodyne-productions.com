<?php

namespace Support\Presenters;

use Illuminate\Pagination\AbstractPaginator;
use AdditionApps\FlexiblePresenter\FlexiblePresenter as BaseFlexiblePresenter;

abstract class FlexiblePresenter extends BaseFlexiblePresenter
{
    /**
     * @var  AbstractPaginator
     */
    public $paginator;

    public function __construct($data = null)
    {
        if ($data instanceof AbstractPaginator) {
            $this->paginator = $data;
            $this->collection = collect($data->items())->values();
        }

        parent::__construct($data);
    }

    public function collectionValues(): array
    {
        return [];
    }

    public static function paginator($paginator): self
    {
        return new static($paginator);
    }

    public function paginate(): array
    {
        return collect()
            ->put('data', collect($this->get())->all())
            ->put('meta', [
                'current_page' => $this->paginator->currentPage(),
                'first_page_url' => $this->paginator->url(1),
                'from' => $this->paginator->firstItem(),
                'last_page' => $this->paginator->lastPage(),
                'last_page_url' => $this->paginator->url($this->paginator->lastPage()),
                'next_page_url' => $this->paginator->nextPageUrl(),
                'path' => $this->paginator->path(),
                'per_page' => $this->paginator->perPage(),
                'prev_page_url' => $this->paginator->previousPageUrl(),
                'to' => $this->paginator->lastItem(),
                'total' => $this->paginator->total(),
            ])
            ->put('links', [
                'first' => $this->paginator->url(1) ?? null,
                'last' => $this->paginator->url($this->paginator->lastPage()) ?? null,
                'prev' => $this->paginator->previousPageUrl() ?? null,
                'next' => $this->paginator->nextPageUrl() ?? null,
            ])
            ->merge($this->collectionValues())
            ->all();
    }
}
