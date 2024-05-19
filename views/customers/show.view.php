<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/header.php') ?>

<!-- phan noi dung chinh -->
<div class="relative flex flex-col gap-4 pb-6 overflow-x-clip">
  <div class='flex items-center gap-1.5'>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
      <path
        d="M12 11C14.7614 11 17 13.2386 17 16V22H15V16C15 14.4023 13.7511 13.0963 12.1763 13.0051L12 13C10.4023 13 9.09634 14.2489 9.00509 15.8237L9 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5.5 14C5.77885 14 6.05009 14.0326 6.3101 14.0942C6.14202 14.594 6.03873 15.122 6.00896 15.6693L6 16L6.0007 16.0856C5.88757 16.0456 5.76821 16.0187 5.64446 16.0069L5.5 16C4.7203 16 4.07955 16.5949 4.00687 17.3555L4 17.5V22H2V17.5C2 15.567 3.567 14 5.5 14ZM18.5 14C20.433 14 22 15.567 22 17.5V22H20V17.5C20 16.7203 19.4051 16.0796 18.6445 16.0069L18.5 16C18.3248 16 18.1566 16.03 18.0003 16.0852L18 16C18 15.3343 17.8916 14.694 17.6915 14.0956C17.9499 14.0326 18.2211 14 18.5 14ZM5.5 8C6.88071 8 8 9.11929 8 10.5C8 11.8807 6.88071 13 5.5 13C4.11929 13 3 11.8807 3 10.5C3 9.11929 4.11929 8 5.5 8ZM18.5 8C19.8807 8 21 9.11929 21 10.5C21 11.8807 19.8807 13 18.5 13C17.1193 13 16 11.8807 16 10.5C16 9.11929 17.1193 8 18.5 8ZM5.5 10C5.22386 10 5 10.2239 5 10.5C5 10.7761 5.22386 11 5.5 11C5.77614 11 6 10.7761 6 10.5C6 10.2239 5.77614 10 5.5 10ZM18.5 10C18.2239 10 18 10.2239 18 10.5C18 10.7761 18.2239 11 18.5 11C18.7761 11 19 10.7761 19 10.5C19 10.2239 18.7761 10 18.5 10ZM12 2C14.2091 2 16 3.79086 16 6C16 8.20914 14.2091 10 12 10C9.79086 10 8 8.20914 8 6C8 3.79086 9.79086 2 12 2ZM12 4C10.8954 4 10 4.89543 10 6C10 7.10457 10.8954 8 12 8C13.1046 8 14 7.10457 14 6C14 4.89543 13.1046 4 12 4Z">
      </path>
    </svg>
    <span class='font-semibold text-lg'>Chi tiết khách hàng</span>
  </div>
  <div class="grid grid-cols-1 items-start gap-4">

    <div class="col-span-1 md:col-span-1 flex flex-col gap-4">
      <div class="flex flex-col gap-5 p-5 bg-white rounded border border-neutral-5 shadow
      overflow-hidden">
        <div class="flex flex-col gap-1.5">
          <span class="pb-2.5 text-[15px] font-semibold leading-5 border-b border-neutral-5">Thông tin khách hàng</span>
          <div class="grid sm:grid-cols-[1fr_1fr] md:grid-cols-[1fr_1fr_2fr] gap-2.5">
            <div class="flex flex-col gap-1.5">
              <label for="customerPhone">
                Số điện thoại
              </label>
              <input type="text" name="customerPhone" id="customerPhone" placeholder="Nhập số điện thoại"
                class="base-input-sm" value="<?= $customer['phone_number'] ?>" disabled>
            </div>
            <div class="flex flex-col gap-1.5" id="form-field-customer-name">
              <label for="customerName">
                Họ và tên
              </label>
              <input type="text" name="customerName" id="customerName" placeholder="Nhập họ và tên"
                class="base-input-sm" value="<?= $customer['full_name'] ?>" disabled>
            </div>
            <div class="flex flex-col gap-1.5 sm:col-span-2 md:col-span-1" id="form-field-customer-address">
              <label for="customerAddress">
                Địa chỉ
              </label>
              <input type="text" name="customerAddress" id="customerAddress" class="base-input-sm"
                value="<?= $customer['address'] ?>" disabled>
            </div>
          </div>
        </div>
        <div class="flex flex-col gap-1.5">
          <span class="pb-2.5 text-[15px] font-semibold leading-5 border-b border-neutral-5">Thống kê cơ bản</span>
          <div class="grid sm:grid-cols-[1fr_1fr_1fr] gap-2.5">
            <div class="flex flex-col gap-1.5">
              <label for="totalAmount">
                Tổng đơn hàng
              </label>
              <input type="text" name="totalAmount" id="totalAmount" placeholder="Nhập tiền nhận từ khách hàng"
                class="base-input-sm" value="<?= currency_format($customer['total_amount']) ?>" disabled>
            </div>
            <div class="flex flex-col gap-1.5">
              <label for="paidAmount">
                Số đơn hàng
              </label>
              <input type="text" name="paidAmount" id="paidAmount" placeholder="Nhập tiền nhận từ khách hàng"
                class="base-input-sm" value="<?= $customer['total_orders'] ?>" disabled>
            </div>
          </div>
        </div>
        <div class="flex flex-col gap-1.5">
          <span class="pb-2.5 text-[15px] font-semibold leading-5 border-b border-neutral-5">Danh sách đơn hàng</span>
          <div class="flex flex-col">
            <!-- PROPERTIES -->
            <div
              class="grid border-b-[2px] border-neutral-5 <?= $_SESSION['user']['role'] === "admin" ? 'grid-cols-[1fr_1fr_1fr_1fr_1fr_1fr_1fr_1fr_1fr]' : 'grid-cols-[1fr_1fr_1fr_1fr_1fr_1fr_1fr]' ?>">
              <span class="p-2.5 text-neutral-7">Mã đơn hàng</span>
              <span class="p-2.5 text-neutral-7">Nhân viên bán hàng</span>
              <span class="p-2.5 text-neutral-7">Tên khách hàng</span>
              <?php if ($_SESSION['user']['role'] == 'admin'): ?>
                <span class="p-2.5 text-neutral-7 truncate">Tổng giá nhập(1)</span>
              <?php endif; ?>
              <span class="p-2.5 text-neutral-7">Tổng đơn
                hàng(<?= $_SESSION['user']['role'] == 'admin' ? 2 : 1 ?>)</span>
              <span class="p-2.5 text-neutral-7">Tiền khách
                trả(<?= $_SESSION['user']['role'] == 'admin' ? 3 : 2 ?>)</span>
              <span class="p-2.5 text-neutral-7">Tiền hoàn
                trả(<?= $_SESSION['user']['role'] == 'admin' ? "3-2" : "2-1" ?>)</span>
              <?php if ($_SESSION['user']['role'] == 'admin'): ?>
                <span class="p-2.5 text-neutral-7">Lợi
                  nhuận(<?= $_SESSION['user']['role'] == 'admin' ? "2-1" : "" ?>)</span>
              <?php endif; ?>
              <span class="p-2.5 text-neutral-7">Thao tác</span>
            </div>
            <div class="flex flex-col overflow-y-auto not-show-scroll h-[35vh]">
              <?php foreach ($transactions as $transaction): ?>
                <!-- PRODUCT INFO -->
                <div
                  class="grid border-b-[2px] border-neutral-5 items-center <?= $_SESSION['user']['role'] === "admin" ? 'grid-cols-[1fr_1fr_1fr_1fr_1fr_1fr_1fr_1fr_1fr]' : 'grid-cols-[1fr_1fr_1fr_1fr_1fr_1fr_1fr]' ?>">
                  <span class="p-2.5 text-neutral-10"><?= $transaction['orderCode'] ?></span>
                  <span class="p-2.5 text-neutral-10"><?= $transaction['salePerson_name'] ?></span>
                  <span class="p-2.5 text-neutral-10"><?= $transaction['customer_name'] ?></span>
                  <?php if ($_SESSION['user']['role'] == 'admin'): ?>
                    <span class="p-2.5 text-neutral-10"><?= currency_format($transaction['total_import_price']) ?></span>
                  <?php endif; ?>
                  <span class="p-2.5 text-neutral-10"><?= currency_format($transaction['total_amount']) ?></span>
                  <span class="p-2.5 text-neutral-10"><?= currency_format($transaction['paid_amount']) ?></span>
                  <span class="p-2.5 text-neutral-10"><?= currency_format($transaction['change_amount']) ?></span>
                  <?php if ($_SESSION['user']['role'] == 'admin'): ?>
                    <span
                      class="p-2.5 text-neutral-10"><?= currency_format(($transaction['total_amount'] - $transaction['total_import_price'])) ?></span>
                  <?php endif; ?>
                  <span class="p-2.5 text-neutral-10 flex items-center gap-2">
                    <a class="button-primary-ghost-sm py-1 px-2"
                      href="/transaction?id=<?= $transaction['transaction_id'] ?>">Xem</a>
                  </span>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
      <div class=" flex items-center justify-end gap-2.5">
        <a href="/transactions" class="button-primary-solid-sm">Quay lại</a>
      </div>
    </div>
  </div>
</div>

<?php require base_path('views/partials/footer.php') ?>