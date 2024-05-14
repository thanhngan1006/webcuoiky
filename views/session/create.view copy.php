<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/header.php') ?>

<div class="flex flex-col gap-5 max-w-[768px] p-5 bg-white rounded-sm border border-neutral-5 shadow overflow-hidden ">

  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
      <h2 class="mt-6 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Login</h2>
    </div>

    <form method="POST" action="/session" class="flex gap-2.5 items-end mt-6">
      <div class="flex flex-col gap-1.5">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Nhap email" class="base-input-sm" value="">
        <?php if (isset($errors['email'])) :  ?>
          <p class="text-red-500 text-xs mt-2"> <?= $errors['email'] ?></p>
        <?php endif; ?>
      </div>
      <div class="flex flex-col gap-1.5">
        <label for="password_hash">Mật khẩu</label>
        <input type="text" name="password_hash" id="password_hash" placeholder="Nhập mật khẩu" class="base-input-sm">
        <?php if (isset($errors['password_hash'])) :  ?>
          <p class="text-red-500 text-xs mt-2"> <?= $errors['password_hash'] ?></p>
        <?php endif; ?>
      </div>

      <button class="button-secondary-solid-md" type="submit">
        <span>Login</span>
      </button>

    </form>

  </div>

</div>

<?php require base_path('views/partials/footer.php') ?>