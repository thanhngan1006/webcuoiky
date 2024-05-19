<header class="fixed w-full z-30 flex bg-white p-2 items-center justify-center h-16 px-10 shadow">
  <div class="logo ml-12 transform ease-in-out duration-300 flex-none h-full flex items-center justify-center">
    PhoneStore
  </div>
  <!-- SPACER -->
  <div class="grow h-full flex items-center justify-center"></div>

  <!-- phan hinh + username tren thanh header -->
  <div class="flex relative ">
    <div class="user-information flex" onclick="toggleMenu()">
      <div class="flex-none h-full text-center flex items-center justify-center">

        <div class="flex gap-x-3 items-center px-3">
          <div class="flex-none flex justify-center">
            <div class="w-8 h-8 flex rounded-full overflow-hidden">
              <img
                src="<?= $_SESSION['user']['profile_picture_url'] ?? 'https://1.bp.blogspot.com/-LjgFJBMTmeM/YZ-UJ2Mdb-I/AAAAAAAACMk/3iYczLi5BTQefjXjnJsNtaSYlP-A2jO6wCLcBGAsYHQ/s1200/2a.jpg' ?>"
                alt="Profile Picture" />
            </div>
          </div>
          <!-- <div class="hidden md:block text-sm md:text-md text-black">John Doe</div> -->
        </div>
      </div>
      <h1 class="text-2xl font-bold tracking-tight text-gray-900">
        <?= $_SESSION['user']['full_name'] ?? 'Guest' ?>
      </h1>
    </div>

    <div id="subMenu"
      class="absolute top-full bg-white shadow-md right-0 w-44 max-h-0 overflow-hidden transition-all duration-500">
      <div class="flex flex-col gap-2">
        <?php if ($_SESSION['user'] ?? false): ?>
          <form method="POST" action="/session">
            <input type="hidden" name="_method" value="DELETE" />
            <button class="px-2 pb-2 text-common-error">Đăng xuất</button>
          </form>
        <?php endif; ?>
      </div>
    </div>
  </div>
  </div>

</header>


<aside
  class="w-60 -translate-x-48 fixed transition transform ease-in-out duration-300 z-50 flex h-screen bg-white shadow">
  <!-- open sidebar button -->
  <div
    class="max-toolbar absolute top-2 -right-6 flex items-center gap-3 w-full h-12 rounded-full border-4 border-primary bg-white transition transform translate-x-24 ease-in duration-300 scale-x-0">

    <div class="flex items-center pl-4">
      <div class="w-5 h-5 text-primary ease-in-out duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512" strokeWidth={3}
          stroke="currentColor">
          <path
            d="M35.42 188.21l207.75 269.46a16.17 16.17 0 0025.66 0l207.75-269.46a16.52 16.52 0 00.95-18.75L407.06 55.71A16.22 16.22 0 00393.27 48H118.73a16.22 16.22 0 00-13.79 7.71L34.47 169.46a16.52 16.52 0 00.95 18.75zM48 176h416"
            fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
          <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"
            d="M400 64l-48 112-96-128M112 64l48 112 96-128M256 448l-96-272M256 448l96-272" />
        </svg>
      </div>
    </div>
    <div
      class="flex items-center justify-center gap-x-3 w-40 group bg-gradient-to-r from-primary-6 to-primary-3 py-1 rounded-full text-white">
      <div class="transform ease-in-out duration-300 px-16">PhoneStore</div>
    </div>
  </div>
  <div onclick="openNav()"
    class="-right-6 transition transform ease-in-out duration-300 flex border-4 border-white bg-primary absolute top-2 p-3 rounded-full text-white hover:rotate-45">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={3} stroke="currentColor"
      class="w-4 h-4">
      <path strokeLinecap="round" strokeLinejoin="round"
        d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
    </svg>
  </div>
  <!-- MAX SIDEBAR-->
  <div class="max-sidebar hidden text-white mt-20 flex-col gap-y-2 w-full h-screen">

    <!-- log out -->
    <?php if ($_SESSION['user'] ?? false): ?>
      <div class="ml-3">
        <form class="px-4" method="POST" action="/session">
          <input type="hidden" name="_method" value="DELETE" />
          <button class="text-red-700">Log Out</button>
        </form>
      </div>
    <?php endif; ?>

  </div>

</aside>
<div class="content h-screen ml-12 transform ease-in-out duration-300 pt-20 px-4 md:px-5 pb-4">