<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/header.php') ?>


<!-- phan noi dung chinh -->
<div class="flex flex-col gap-4">
  <div class='flex items-center gap-1.5'>
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 512 512">
      <path d="M402 168c-2.93 40.67-33.1 72-66 72s-63.12-31.32-66-72c-3-42.31 26.37-72 66-72s69 30.46 66 72z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
      <path d="M336 304c-65.17 0-127.84 32.37-143.54 95.41-2.08 8.34 3.15 16.59 11.72 16.59h263.65c8.57 0 13.77-8.25 11.72-16.59C463.85 335.36 401.18 304 336 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
      <path d="M200 185.94c-2.34 32.48-26.72 58.06-53 58.06s-50.7-25.57-53-58.06C91.61 152.15 115.34 128 147 128s55.39 24.77 53 57.94z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
      <path d="M206 306c-18.05-8.27-37.93-11.45-59-11.45-52 0-102.1 25.85-114.65 76.2-1.65 6.66 2.53 13.25 9.37 13.25H154" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" />
    </svg>
    <span class='font-semibold text-lg'>Xem thông tin cá nhân</span>
  </div>
  <div class="flex flex-col gap-5 p-5 bg-white rounded-sm border border-neutral-5 shadow overflow-hidden">
    <div class="container mx-auto ">
      <div class="max-w-lg mx-auto">

        <form method="PATCH" action="/user">
          <div class="space-y-12">

            <div class=" pb-4">
              <h2 class="text-base font-semibold leading-7 text-gray-900 mb-8">Thông tin cá nhân</h2>

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
                    <input id="profile_picture_url" name="profile_picture_url" type="text" autocomplete="profile_picture_url" class="px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="<?= $user['profile_picture_url']  ?? 'https://1.bp.blogspot.com/-LjgFJBMTmeM/YZ-UJ2Mdb-I/AAAAAAAACMk/3iYczLi5BTQefjXjnJsNtaSYlP-A2jO6wCLcBGAsYHQ/s1200/2a.jpg' ?>" disabled>
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
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900"><a href="/">Go back</a></button>
            <a class="same-btn edit-btn text-gray-500 border border-current px-3 py-1 rounded" href="/user/edit?id=<?= $user['id'] ?>">Chỉnh sửa hình ảnh</a>
          </div>

          </ </form>

      </div>
    </div>
  </div>
</div>
<?php require base_path('views/partials/footer.php') ?>