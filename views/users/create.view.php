<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/header.php') ?>

<div class="flex items-center justify-center min-h-screen bg-gray-50">

  <div class="w-full max-w-md p-5 bg-white rounded-sm border border-neutral-5 shadow overflow-hidden">

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <img class="mx-auto h-10 w-auto" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlCJruf9OzOzpJyBGnDc-OnU9GKrArHEmJtVHFhZj0UQ&s" alt="Your Picture">
      <h2 class="mt-6 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Tạo tài khoản</h2>
    </div>

    <!-- Centered form -->
    <form method="POST" action="/users" class="space-y-5 mt-6">
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" id="email" class=" base-input-sm mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Nhập email" value="">
        <?php if (isset($errors['email'])) :  ?>
          <p class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></p>
        <?php endif; ?>
      </div>
      <div>
        <label for="full_name" class="block text-sm font-medium text-gray-700">Họ và tên</label>
        <input type="text" name="full_name" id="full_name" placeholder="Nhập họ và tên" class="base-input-sm mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="">
        <?php if (isset($errors['full_name'])) :  ?>
          <p class="text-red-500 text-xs mt-2"><?= $errors['full_name'] ?></p>
        <?php endif; ?>
      </div>


      <div>
        <button class="button-secondary-solid-md w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" type="submit" name="send">
          Tạo
        </button>
      </div>
    </form>
  </div>
</div>

<?php require base_path('views/partials/footer.php') ?>