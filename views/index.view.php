<?php require('partials/head.php') ?>
<?php require('partials/header.php') ?>

<!-- phan noi dung chinh -->
<div class="flex flex-col gap-4">
  <div class='flex items-center gap-1.5'>
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 512 512">
      <path d="M80 212v236a16 16 0 0016 16h96V328a24 24 0 0124-24h80a24 24 0 0124 24v136h96a16 16 0 0016-16V212" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
      <path d="M480 256L266.89 52c-5-5.28-16.69-5.34-21.78 0L32 256M400 179V64h-48v69" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
    </svg>
    <span class='font-semibold text-lg'>Trang chủ</span>
  </div>
  <div class="flex flex-col gap-5 p-5 bg-white rounded-sm border border-neutral-5 shadow overflow-hidden">

    <!-- LIST PRODUCTS -->
    <div class="flex flex-col">
      <div class="flex flex-row gap-5 content-between justify-between p-3">
        <div class="flex items-center justify-center w-6/12 h-36 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded text-slate-100">
          <a href="/transactions">Quản lý giao dịch</a>
        </div>
        <div class="flex items-center justify-center w-6/12 h-36 bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90% rounded text-slate-100">
          <a href="/users">Quản lý nhân viên</a>
        </div>
      </div>

      <div class="flex flex-row gap-5 content-between justify-between p-3">
        <div class="flex items-center justify-center w-6/12 h-36 bg-gradient-to-r from-cyan-500 to-yellow-500  rounded text-slate-100">
          <a href="/customers">Quản lý khách hàng</a>
        </div>
        <div class="flex items-center justify-center w-6/12 h-36 bg-gradient-to-r from-yellow-200 via-orange-300 to-pink-300  rounded text-slate-100">
          <a href="/products">Quản lý sản phẩm</a>
        </div>
      </div>

      <div class="flex flex-row gap-5 content-between justify-between p-3">
        <div class="flex items-center justify-center w-6/12 h-36 bg-gradient-to-r from-green-600 via-teal-500 to-lime-500  rounded text-slate-100"">
          <a href=" /reports">Báo cáo và thống kê</a>
        </div>

        <div class="flex items-center justify-center w-6/12 h-36   rounded text-slate-100"">
          <!-- <a href=" /reports">Báo cáo và thống kê</a> -->
        </div>
      </div>

    </div>
  </div>
</div>

<?php require('partials/footer.php') ?>