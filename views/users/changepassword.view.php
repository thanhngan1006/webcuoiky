<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/header.php') ?>
<?php require BASE_PATH . 'Core/Authenticator.php' ?>
<?php

use Core\Authenticator; ?>

<script src="/js/showPassword.js" defer>
</script>

<div class="flex flex-col gap-4">
  <div class='flex items-center gap-1.5'>
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 512 512">
      <path d="M218.1 167.17c0 13 0 25.6 4.1 37.4-43.1 50.6-156.9 184.3-167.5 194.5a20.17 20.17 0 00-6.7 15c0 8.5 5.2 16.7 9.6 21.3 6.6 6.9 34.8 33 40 28 15.4-15 18.5-19 24.8-25.2 9.5-9.3-1-28.3 2.3-36s6.8-9.2 12.5-10.4 15.8 2.9 23.7 3c8.3.1 12.8-3.4 19-9.2 5-4.6 8.6-8.9 8.7-15.6.2-9-12.8-20.9-3.1-30.4s23.7 6.2 34 5 22.8-15.5 24.1-21.6-11.7-21.8-9.7-30.7c.7-3 6.8-10 11.4-11s25 6.9 29.6 5.9c5.6-1.2 12.1-7.1 17.4-10.4 15.5 6.7 29.6 9.4 47.7 9.4 68.5 0 124-53.4 124-119.2S408.5 48 340 48s-121.9 53.37-121.9 119.17zM400 144a32 32 0 11-32-32 32 32 0 0132 32z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
    </svg>

    <span class='font-semibold text-lg'>Thay đổi mật khẩu </span>
  </div>
  <div class="flex flex-col gap-5 p-5 bg-white rounded-sm border border-neutral-5 shadow overflow-hidden items-center justify-center min-h-screen">


    <div class="w-full max-w-md p-5  rounded-sm border border-neutral-5 shadow overflow-hidden">

      <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <img class="mx-auto h-10 w-auto" src="https://nupet.vn/wp-content/uploads/2023/10/hinh-nen-ngo-nghinh-anh-meo-cute-nupet-13.jpg" alt="Your Company">
        <h2 class="mt-6 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Thay đổi mật khẩu</h2>
      </div>

      <!-- Centered form -->
      <form method="POST" action="/user/changepassword" class="space-y-5 mt-6">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">

        <div>
          <label for="password_hash" class="block text-sm font-medium text-gray-700">Mật khẩu hiện tại</label>
          <input type="password" name="password_hash" id="password_hash" class=" base-input-sm mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Nhập mật khẩu hiện tại" value="<?= isset($_POST['password_hash']) ? $_POST['password_hash'] : '' ?>">
          <?php if (isset($errors['password_hash'])) :  ?>
            <p class="text-red-500 text-xs mt-2"><?= $errors['password_hash'] ?></p>
          <?php endif; ?>
        </div>

        <div>
          <label for="new_password_hash" class="block text-sm font-medium text-gray-700">Mật khẩu mới</label>
          <input type="password" name="new_password_hash" id="new_password_hash" class=" base-input-sm mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Nhập mật khẩu mới" value="<?= isset($_POST['new_password_hash']) ? $_POST['new_password_hash'] : '' ?>">
          <?php if (isset($errors['new_password_hash'])) :  ?>
            <p class="text-red-500 text-xs mt-2"><?= $errors['new_password_hash'] ?></p>
          <?php endif; ?>
        </div>

        <div>
          <label for="confirm_new_password_hash" class="block text-sm font-medium text-gray-700">Nhập lại mật khẩu mới</label>
          <input type="password" name="confirm_new_password_hash" id="confirm_new_password_hash" placeholder="Nhập lại mật khẩu mới" class="base-input-sm mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="<?= isset($_POST['confirm_new_password_hash']) ? $_POST['confirm_new_password_hash'] : '' ?>">
          <?php if (isset($errors['confirm_new_password_hash'])) :  ?>
            <p class="text-red-500 text-xs mt-2"><?= $errors['confirm_new_password_hash'] ?></p>
          <?php endif; ?>
        </div>

        <div class="flex items-center justify-start gap-2">
          <input type="checkbox" onclick="showPassword()">Hiện mật khẩu
        </div>

        <div class="flex flex-col gap-2">
          <button class="button-secondary-solid-md w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" type="submit">
            Xác nhận
          </button>
          <a href="/" class="button-secondary-solid-md w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-black bg-gray-300 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
            Quay lại
          </a>
        </div>
      </form>
    </div>
  </div>
</div>