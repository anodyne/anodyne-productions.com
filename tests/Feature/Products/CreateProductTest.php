<?php

declare(strict_types=1);

use App\Filament\Resources\ProductResource;
use App\Filament\Resources\ProductResource\Pages\CreateProduct;
use App\Models\Product;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

uses()->group('products');

describe('admin user', function () {
    beforeEach(function () {
        signInAsAdmin();
    });

    it('renders the create product page', function () {
        get(ProductResource::getUrl('create'))
            ->assertOk();
    });

    it('creates a product', function () {
        $productData = Product::factory()->make();

        livewire(CreateProduct::class)
            ->fillForm([
                'name' => $productData->name,
                'description' => $productData->description,
                'published' => $productData->published,
            ])
            ->call('create')
            ->assertHasNoFormErrors()
            ->assertNotified();

        assertDatabaseHas(Product::class, [
            'name' => $productData->name,
            'description' => $productData->description,
            'published' => $productData->published,
        ]);
    });
});

describe('staff user', function () {
    beforeEach(function () {
        signInAsStaff();
    });

    it('cannot render the create product page', function () {
        get(CreateProduct::getUrl())->assertForbidden();
    });

    it('cannot create a product', function () {
        $productData = Product::factory()->make();

        livewire(CreateProduct::class)
            ->assertForbidden();

        assertDatabaseMissing(Product::class, [
            'name' => $productData->name,
            'description' => $productData->description,
            'published' => $productData->published,
        ]);
    });
});

describe('unauthenticated user', function () {
    test('cannot view the create product page', function () {
        get(CreateProduct::getUrl())
            ->assertRedirectToRoute('filament.admin.auth.login');
    });

    it('cannot create a product', function () {
        $productData = Product::factory()->make();

        livewire(CreateProduct::class)
            ->assertForbidden();

        assertDatabaseMissing(Product::class, [
            'name' => $productData->name,
            'description' => $productData->description,
            'published' => $productData->published,
        ]);
    });
});
