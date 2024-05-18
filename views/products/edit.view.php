<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/header.php') ?>
<div class="flex flex-col gap-4">
  <div class='flex items-center gap-1.5'>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 512 512" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
      <ellipse cx="256" cy="128" rx="192" ry="80" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" />
      <path d="M448 214c0 44.18-86 80-192 80S64 258.18 64 214M448 300c0 44.18-86 80-192 80S64 344.18 64 300" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" />
      <path d="M64 127.24v257.52C64 428.52 150 464 256 464s192-35.48 192-79.24V127.24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" />
    </svg>
    <span class='font-semibold text-lg'>Chỉnh sửa sản phẩm</span>
  </div>
  <div class="flex flex-col gap-5 p-5 bg-white rounded-sm border border-neutral-5 shadow overflow-hidden">
    <div class="container mx-auto ">
      <div class="max-w-lg mx-auto">

        <form method="POST" action="/product">
          <input type="hidden" name="_method" value="PATCH">
          <input type="hidden" name="barcode" value="<?= $product['barcode'] ?>">

          <div class="space-y-12">

            <div class=" pb-4">
              <h2 class="text-base font-semibold leading-7 text-gray-900 mb-8">Chỉnh sửa thông tin sản phẩm</h2>

              <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                  <label for="barcode" class="block text-sm font-medium leading-6 text-gray-900">Barcode</label>
                  <div class="mt-2">
                    <input type="text" name="barcode" id="barcode" autocomplete="barcode" class=" px-3  block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?= $product['barcode']  ?>" disabled>

                  </div>
                  <?php if (isset($errors['barcode'])) : ?>
                    <p class="text-red-500 text-xs mt-1"><?= $errors['barcode'] ?></p>
                  <?php endif; ?>

                </div>

                <div class="sm:col-span-3">
                  <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Product's name</label>
                  <div class="mt-2">
                    <input type="text" name="name" id="name" autocomplete="name" class=" px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?= $product['name']  ?>">
                  </div>
                  <?php if (isset($errors['name'])) : ?>
                    <p class="text-red-500 text-xs mt-1"><?= $errors['name'] ?></p>
                  <?php endif; ?>
                </div>

                <div class="sm:col-span-4">
                  <label for="import_price" class="block text-sm font-medium leading-6 text-gray-900">Import Price</label>
                  <div class="mt-2">
                    <input id="import_price" name="import_price" type="text" autocomplete="import_price" class=" px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?= $product['import_price']  ?>">
                  </div>
                  <?php if (isset($errors['import_price'])) : ?>
                    <p class="text-red-500 text-xs mt-1"><?= $errors['import_price'] ?></p>
                  <?php endif; ?>
                </div>

                <div class="sm:col-span-4">
                  <label for="retail_price" class="block text-sm font-medium leading-6 text-gray-900">Retail Price</label>
                  <div class="mt-2">
                    <input id="retail_price" name="retail_price" type="text" autocomplete="retail_price" class=" px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?= $product['retail_price'] ?>">
                  </div>
                  <?php if (isset($errors['retail_price'])) : ?>
                    <p class="text-red-500 text-xs mt-1"><?= $errors['retail_price'] ?></p>
                  <?php endif; ?>
                </div>

                <div class="sm:col-span-4">
                  <label for="image_url" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                  <div class="mt-2">
                    <input id="image_url" name="image_url" type="text" autocomplete="image_url" class="px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?= $product['image_url'] ?>">
                  </div>
                  <?php if (isset($errors['image_url'])) : ?>
                    <p class="text-red-500 text-xs mt-1"><?= $errors['image_url'] ?></p>
                  <?php endif; ?>
                </div>

                <div class="sm:col-span-4">
                  <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                  <div class="mt-2">
                    <input id="category" name="category" type="text" autocomplete="category" class="px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?= $product['category']  ?>">
                  </div>
                  <?php if (isset($errors['category'])) : ?>
                    <p class="text-red-500 text-xs mt-1"><?= $errors['category'] ?></p>
                  <?php endif; ?>
                </div>






              </div>
            </div>


          </div>

          <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900"><a href="/products">Cancel</a></button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
          </div>
          </ </form>

      </div>
    </div>
  </div>
</div>

<?php require base_path('views/partials/footer.php') ?>