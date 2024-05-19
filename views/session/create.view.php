<?php require base_path('views/partials/head.php') ?>
<script src="/js/showPassword.js" defer>
</script>
<div class="flex items-center justify-center min-h-screen bg-gray-50">

  <div class="w-full max-w-md p-5 bg-white rounded-sm border border-neutral-5 shadow overflow-hidden">

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <img class="mx-auto h-10 w-auto" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQk7nty-ZHG-72lgXayzdzs-F4MdXdHhZe0FA&s" alt="Your Company">
      <h2 class="mt-6 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">LOGIN</h2>
    </div>

    <!-- Centered form -->
    <form method="POST" action="/session" class="space-y-5 mt-6">

      <div>
        <label for="username" class="block text-sm font-medium text-gray-700">Tên đăng nhập</label>
        <input type="text" name="username" id="username" class=" base-input-sm mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Nhập tên đăng nhập" value="<?= old('username') ?>">
        <?php if (isset($errors['username'])) :  ?>
          <p class="text-red-500 text-xs mt-2"><?= $errors['username'] ?></p>
        <?php endif; ?>
      </div>
      <div>
        <label for="password_hash" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
        <input type="password" name="password_hash" id="password_hash" placeholder="Nhập mật khẩu" class="base-input-sm mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <?php if (isset($errors['password_hash'])) :  ?>
          <p class="text-red-500 text-xs mt-2"><?= $errors['password_hash'] ?></p>
        <?php endif; ?>
      </div>
      <div class="flex items-center justify-start gap-2">
        <input type="checkbox" onclick="myFunction()">Show Password
      </div>

      <div>
        <button class="button-secondary-solid-md w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" type="submit">
          Login
        </button>
      </div>
    </form>
  </div>
</div>