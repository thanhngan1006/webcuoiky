<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/header.php') ?>
<div class="flex flex-col gap-4">
  <div class='flex items-center gap-1.5'>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 512 512" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
      <ellipse cx="256" cy="128" rx="192" ry="80" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" />
      <path d="M448 214c0 44.18-86 80-192 80S64 258.18 64 214M448 300c0 44.18-86 80-192 80S64 344.18 64 300" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" />
      <path d="M64 127.24v257.52C64 428.52 150 464 256 464s192-35.48 192-79.24V127.24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" />
    </svg>
    <span class='font-semibold text-lg'>Cập nhật hình ảnh </span>
  </div>
  <div class="flex flex-col gap-5 p-5 bg-white rounded-sm border border-neutral-5 shadow overflow-hidden">
    <div class="container mx-auto ">
      <div class="max-w-lg mx-auto">

        <form method="POST" action="/user">
          <input type="hidden" name="_method" value="PATCH">
          <input type="hidden" name="id" value="<?= $user['id'] ?>">
          <div class="space-y-12">

            <div class=" pb-4">
              <h2 class="text-base font-semibold leading-7 text-gray-900 mb-8">Cập nhật hình ảnh</h2>

              <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                  <label for="full_name" class="block text-sm font-medium leading-6 text-gray-900">Tên</label>
                  <div class="mt-2">
                    <input type="text" name="full_name" id="full_name" autocomplete="full_name" class=" px-3  block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?= $user['full_name']  ?>" disabled>

                  </div>

                </div>

                <div class="sm:col-span-3">
                  <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                  <div class="mt-2">
                    <input type="email" email="email" id="email" autocomplete="email" class=" px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?= $user['email']  ?>" disabled>
                  </div>

                </div>



                <div class="sm:col-span-3">
                  <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Tên đăng nhập</label>
                  <div class="mt-2">
                    <input id="username" name="username" type="text" autocomplete="username" class=" px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?= $user['username']  ?>" disabled>
                  </div>

                </div>

                <div class="sm:col-span-3">
                  <label for="role" class="block text-sm font-medium leading-6 text-gray-900">Vai trò</label>
                  <div class="mt-2">
                    <input id="role" name="role" type="text" autocomplete="role" class=" px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?= $user['role'] ?>" disabled>
                  </div>

                </div>

                <div class="sm:col-span-4">
                  <label for="profile_picture_url" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                  <div class="mt-2">
                    <input id="profile_picture_url" name="profile_picture_url" type="text" autocomplete="profile_picture_url" class="px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?= $user['profile_picture_url']  ?? 'https://1.bp.blogspot.com/-LjgFJBMTmeM/YZ-UJ2Mdb-I/AAAAAAAACMk/3iYczLi5BTQefjXjnJsNtaSYlP-A2jO6wCLcBGAsYHQ/s1200/2a.jpg' ?>">
                  </div>

                </div>



                <div class="sm:col-span-4">
                  <div class=" flex gap-2">
                    <input id="is_active" name="is_active" type="radio" autocomplete="is_active" class="" value="<?= $user['is_active'] == 1 ? "Đã kích hoạt" : "Không kích hoạt khóa" ?>" <?= $user['is_active'] == 1 ? 'checked' : '' ?> disabled>
                    <label for=" is_active" class="block text-sm font-medium leading-6 text-gray-900">Đã kích hoạt</label>
                  </div>

                </div>

                <div class="sm:col-span-4">
                  <div class=" flex gap-2">
                    <input id="locked" name="locked" type="radio" autocomplete="locked" class="" value="<?= $user['locked'] == 1 ? "Đã bị khóa" : "Không bị khóa" ?>" <?= $user['locked'] == 1 ? 'checked' : '' ?> disabled>
                    <label for=" locked" class="block text-sm font-medium leading-6 text-gray-900">Đã khóa</label>
                  </div>

                </div>



              </div>
            </div>
          </div>


          <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900"><a href="/user">Cancel</a></button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
          </div>


          </ </form>

      </div>
    </div>
  </div>
</div>

<?php require base_path('views/partials/footer.php') ?>