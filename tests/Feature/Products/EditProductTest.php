<?php

use App\Filament\Resources\ProductResource;
use App\Filament\Resources\ProductResource\Pages\EditProduct;
use App\Models\Product;
use Filament\Actions\DeleteAction;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

uses()->group('products');

beforeEach(fn () => $this->product = Product::factory()->create());

describe('admin user', function () {
    beforeEach(fn () => signInAsAdmin());

    it('renders the edit product page', function () {
        get(ProductResource::getUrl('edit', [
            'record' => $this->product,
        ]))
            ->assertOk();
    });

    it('fills form with product data', function () {
        livewire(EditProduct::class, [
            'record' => $this->product->getKey(),
        ])
            ->assertFormSet([
                'name' => $this->product->name,
                'description' => $this->product->description,
                'published' => $this->product->published,
            ]);
    });

    it('updates a product', function () {
        $newProductData = Product::factory()->make();

        livewire(EditProduct::class, [
            'record' => $this->product->getKey(),
        ])
            ->fillForm([
                'name' => $newProductData->name,
                'description' => $newProductData->description,
                'published' => $newProductData->published,
            ])
            ->call('save')
            ->assertHasNoFormErrors()
            ->assertNotified();

        assertDatabaseHas(Product::class, [
            'id' => $this->product->id,
            'name' => $newProductData->name,
            'description' => $newProductData->description,
            'published' => $newProductData->published,
        ]);
    });

    it('deletes a product', function () {
        livewire(EditProduct::class, [
            'record' => $this->product->getKey(),
        ])
            ->callAction(DeleteAction::class)
            ->assertNotified();

        assertDatabaseMissing(Product::class, [
            'id' => $this->product->id,
        ]);
    });

    test('`name` is required', function () {
        livewire(EditProduct::class, [
            'record' => $this->product->getKey(),
        ])
            ->fillForm([
                'name' => null,
            ])
            ->call('save')
            ->assertHasFormErrors(['name' => 'required']);
    });
});

describe('staff user', function () {
    beforeEach(fn () => signInAsStaff());

    it('cannot render the edit product page', function () {
        get(ProductResource::getUrl('edit', [
            'record' => $this->product,
        ]))
            ->assertForbidden();
    });

    it('fills form with product data', function () {
        livewire(EditProduct::class, [
            'record' => $this->product->getKey(),
        ])
            ->assertForbidden();
    });

    it('updates a product', function () {
        $newProductData = Product::factory()->make();

        livewire(EditProduct::class, [
            'record' => $this->product->getKey(),
        ])
            ->assertForbidden();

        assertDatabaseMissing(Product::class, [
            'id' => $this->product->id,
            'name' => $newProductData->name,
            'description' => $newProductData->description,
            'published' => $newProductData->published,
        ]);
    });

    it('deletes a product', function () {
        livewire(EditProduct::class, [
            'record' => $this->product->getKey(),
        ])
            ->assertForbidden();

        assertDatabaseHas(Product::class, [
            'id' => $this->product->id,
        ]);
    });
});

describe('standard user', function () {
    beforeEach(fn () => signInAsUser());

    it('cannot render the edit product page', function () {
        get(ProductResource::getUrl('edit', [
            'record' => $this->product,
        ]))
            ->assertForbidden();
    });

    it('fills form with product data', function () {
        livewire(EditProduct::class, [
            'record' => $this->product->getKey(),
        ])
            ->assertForbidden();
    });

    it('updates a product', function () {
        $newProductData = Product::factory()->make();

        livewire(EditProduct::class, [
            'record' => $this->product->getKey(),
        ])
            ->assertForbidden();

        assertDatabaseMissing(Product::class, [
            'id' => $this->product->id,
            'name' => $newProductData->name,
            'description' => $newProductData->description,
            'published' => $newProductData->published,
        ]);
    });

    it('deletes a product', function () {
        livewire(EditProduct::class, [
            'record' => $this->product->getKey(),
        ])
            ->assertForbidden();

        assertDatabaseHas(Product::class, [
            'id' => $this->product->id,
        ]);
    });
});

describe('unauthenticated user', function () {
    it('cannot render the edit product page', function () {
        get(ProductResource::getUrl('edit', [
            'record' => $this->product,
        ]))
            ->assertRedirectToRoute('filament.admin.auth.login');
    });

    it('fills form with product data', function () {
        livewire(EditProduct::class, [
            'record' => $this->product->getKey(),
        ])
            ->assertForbidden();
    });

    it('updates a product', function () {
        $newProductData = Product::factory()->make();

        livewire(EditProduct::class, [
            'record' => $this->product->getKey(),
        ])
            ->assertForbidden();

        assertDatabaseMissing(Product::class, [
            'id' => $this->product->id,
            'name' => $newProductData->name,
            'description' => $newProductData->description,
            'published' => $newProductData->published,
        ]);
    });

    it('deletes a product', function () {
        livewire(EditProduct::class, [
            'record' => $this->product->getKey(),
        ])
            ->assertForbidden();

        assertDatabaseHas(Product::class, [
            'id' => $this->product->id,
        ]);
    });
});
