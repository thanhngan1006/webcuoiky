let selectedProductsGlobal = [];
let productsGlobal = [];
let productsShow = [];

const inputSearchProduct = document.getElementById("search-products");
const searchProductList = document.getElementById("search-products-show");
const selectedProducts = document.getElementById("selected-products");
const selectedProductsSummary = document.getElementById(
  "selected-products-summary"
);
const totalAmountSummary = document.getElementById("total-amount-summary");
const totalAmountCustomerSummary = document.getElementById(
  "total-amount-customer"
);
const changeAmountCustomerSummary = document.getElementById(
  "change-amount-customer"
);
const inputCustomerName = document.getElementById("customerName");
const inputCustomerPhone = document.getElementById("customerPhone");
const inputCustomerAddress = document.getElementById("customerAddress");
const inputTotalAmount = document.getElementById("totalAmount");
const btnCheckInfoCustomer = document.getElementById("btn-check-info-customer");
const customerNameLabel = document.getElementById("customerNameLabel");
const customerPhoneLabel = document.getElementById("customerPhoneLabel");
const customerAddressLabel = document.getElementById("customerAddressLabel");
const formFieldCustomerName = document.getElementById(
  "form-field-customer-name"
);
const formFieldCustomerAddress = document.getElementById(
  "form-field-customer-address"
);
const btnSubmit = document.getElementById("submit-transaction-btn");
let isProductClicked = false;

btnCheckInfoCustomer.addEventListener("click", getInfoCustomer);
btnCheckInfoCustomer.classList.add("hidden");

inputTotalAmount.addEventListener("keyup", (event) => {
  totalAmountCustomerSummary.textContent = formatCurrency(event.target.value);
  changeAmountCustomerSummary.textContent = formatCurrency(
    event.target.value -
      selectedProductsGlobal.reduce(
        (sum, product) => sum + product.retail_price * product.quantity,
        0
      )
  );
  isCanSubmitForm();
});
inputCustomerPhone.addEventListener("keyup", handleChangeCustomerPhone);

inputSearchProduct.addEventListener("keyup", handleChangeSearchProducts);
inputSearchProduct.addEventListener("blur", () => {
  if (!isProductClicked) {
    searchProductList.classList.remove("!opacity-100");
    searchProductList.classList.remove("!visible");
    searchProductList.innerHTML = "";
  }
});
searchProductList.addEventListener("mousedown", function () {
  isProductClicked = true;
});

inputSearchProduct.addEventListener("focus", () => {
  isProductClicked = false;
  if (inputSearchProduct.value.length > 0) {
    searchProductList.classList.add("!opacity-100");
    searchProductList.classList.add("!visible");
    productsShow = productsGlobal.filter((product) => {
      if (inputSearchProduct.value.length === 8) {
        return (
          product.name
            .toLowerCase()
            .includes(inputSearchProduct.value.toLowerCase()) ||
          product.barcode === inputSearchProduct.value
        );
      }
      return product.name
        .toLowerCase()
        .includes(inputSearchProduct.value.toLowerCase());
    });

    productsShow = productsShow.slice(0, 20);
    if (!inputSearchProduct.value) {
      searchProductList.innerHTML = ""; // Clear previous results
      productsShow = shuffle(productsShow).slice(0, 5);
    }
    // div to show: searchProductList
    searchProductList.innerHTML = ""; // Clear previous results
    if (productsShow.length) {
      renderSearchProducts();
      return;
    }
  }
  productsShow = shuffle(productsGlobal).slice(0, 5);
  // div to show: searchProductList
  searchProductList.classList.add("!opacity-100");
  searchProductList.classList.add("!visible");
  searchProductList.innerHTML = ""; // Clear previous results
  if (productsShow.length) {
    renderSearchProducts();
  } else {
    searchProductList.innerHTML = ""; // Clear previous results
    searchProductList.innerHTML = "<p>No products found.</p>"; // Message when no products found
  }
});

inputCustomerName.addEventListener("keyup", (event) => {
  customerNameLabel.textContent = event.target.value;
  isCanSubmitForm();
});
inputCustomerPhone.addEventListener("keyup", (event) => {
  customerPhoneLabel.textContent = event.target.value;
  isCanSubmitForm();
});
inputCustomerAddress.addEventListener("keyup", (event) => {
  customerAddressLabel.textContent = event.target.value;
  isCanSubmitForm();
});

function getAllProducts(products) {
  productsGlobal = [...products];
}

function formatCurrency(amount) {
  return new Intl.NumberFormat("vi-VN", {
    style: "currency",
    currency: "VND",
  })
    .format(amount)
    .replaceAll(".", ",");
}

function handleSelectProduct(barcode) {
  isProductClicked = false;
  searchProductList.classList.remove("!opacity-100");
  searchProductList.classList.remove("!visible");
  searchProductList.innerHTML = "";
  barcode = "" + barcode;
  if (barcode.length > 0 && barcode.length < 8) {
    barcode = "0" + barcode;
  }

  const existSelectedProduct = selectedProductsGlobal.findIndex((product) => {
    return product.barcode == barcode;
  });
  if (existSelectedProduct != -1) {
    selectedProductsGlobal = selectedProductsGlobal.filter(
      (s) => s.barcode != barcode
    );
    renderSearchProducts();
    if (checkIsEmptySelectedProducts()) {
      return;
    }
    renderSelectedProducts();
    return;
  }
  const selectedProduct = productsGlobal.find(
    (product) => product.barcode == barcode
  );
  selectedProductsGlobal.push({ ...selectedProduct, quantity: 1 });
  renderSelectedProducts();
  renderSearchProducts();
  isCanSubmitForm();
}

function increaseProductQuantity(barcode) {
  barcode = "" + barcode;
  if (barcode.length > 0 && barcode.length < 8) {
    barcode = "0" + barcode;
  }
  const selectedProductIndex = selectedProductsGlobal.findIndex(
    (product) => product.barcode === barcode
  );
  const updatedProduct = {
    ...selectedProductsGlobal[selectedProductIndex],
    quantity: selectedProductsGlobal[selectedProductIndex].quantity + 1,
  };
  selectedProductsGlobal[selectedProductIndex] = updatedProduct;
  renderSelectedProducts();
  isCanSubmitForm();
}

function decreaseProductQuantity(barcode) {
  barcode = "" + barcode;
  if (barcode.length > 0 && barcode.length < 8) {
    barcode = "0" + barcode;
  }
  const selectedProductIndex = selectedProductsGlobal.findIndex(
    (product) => product.barcode === barcode
  );
  if (selectedProductsGlobal[selectedProductIndex].quantity === 1) {
    selectedProductsGlobal = selectedProductsGlobal.filter(
      (product) => product.barcode !== barcode
    );
    if (checkIsEmptySelectedProducts()) {
      return;
    }
    renderSelectedProducts();
    return;
  }
  const updatedProduct = {
    ...selectedProductsGlobal[selectedProductIndex],
    quantity: selectedProductsGlobal[selectedProductIndex].quantity - 1,
  };
  selectedProductsGlobal[selectedProductIndex] = updatedProduct;
  renderSelectedProducts();
  isCanSubmitForm();
}

const shuffle = (array) => {
  for (let i = array.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
  }
  return array;
};

function handleChangeCustomerPhone(event) {
  formFieldCustomerName.classList.remove("!opacity-100");
  formFieldCustomerName.classList.remove("!visible");
  formFieldCustomerAddress.classList.remove("!opacity-100");
  formFieldCustomerAddress.classList.remove("!visible");
  customerNameLabel.textContent = "";
  customerAddressLabel.textContent = "";
  if (
    event.target.value.trim().length === 0 ||
    !event.target.value.trim().match(PATTERN_VALIDATE_PHONE)
  ) {
    btnCheckInfoCustomer.classList.add("hidden");
    return;
  }
  btnCheckInfoCustomer.classList.remove("hidden");
}

function handleChangeSearchProducts(event) {
  isProductClicked = false;
  productsShow = productsGlobal.filter((product) => {
    if (event.target.value.length === 8) {
      return (
        product.name.toLowerCase().includes(event.target.value.toLowerCase()) ||
        product.barcode === event.target.value
      );
    }
    return product.name
      .toLowerCase()
      .includes(event.target.value.toLowerCase());
  });

  productsShow = productsShow.slice(0, 20);
  if (!event.target.value) {
    searchProductList.innerHTML = ""; // Clear previous results
    productsShow = shuffle(productsShow).slice(0, 5);
  }
  // div to show: searchProductList
  if (productsShow.length) {
    renderSearchProducts();
  } else {
    searchProductList.innerHTML = "";
    searchProductList.innerHTML = "<p>No products found.</p>"; // Message when no products found
  }
}

function checkIsEmptySelectedProducts() {
  if (selectedProductsGlobal.length === 0) {
    handleEmptySelectedProducts();
    return true;
  }
  return false;
}

function renderSelectedProducts() {
  selectedProducts.innerHTML = "";
  selectedProductsSummary.innerHTML = "";
  const totalProductsPrice = sumSelectedProducts();
  totalAmountSummary.textContent = formatCurrency(totalProductsPrice);
  changeAmountCustomerSummary.textContent = formatCurrency(
    inputTotalAmount.value - totalProductsPrice
  );
  const cloneSelectedProductsGlobal = [...selectedProductsGlobal];
  const reversed = cloneSelectedProductsGlobal.reverse();

  reversed.forEach((product) => {
    selectedProducts.innerHTML += `
        <div class="grid grid-cols-[2fr_1fr_1fr_1fr] items-center p-2 border rounded ">
          <div class="flex items-center gap-1.5">
            <img class="w-20"
              src="${product.image_url}"
              alt="${product.name}" loading="lazy">
            <span class="text-md font-semibold">${product.name}</span>
          </div>
          <span class="font-semibold">${formatCurrency(
            product["retail_price"]
          )}</span>
          <div class="flex items-center gap-2 justify-self-center">
            <button type="button" onclick="decreaseProductQuantity(${
              product.barcode
            })" class="items-center p-2 bg-[#EDEDED] cursor-pointer select-none">
              <svg class="w-5 h-5" width='24' height='24' viewBox='0 0 24 24' fill='none'
              xmlns='http://www.w3.org/2000/svg'>
              <rect width='24' height='24' />
              <path d='M5 12H19' stroke='black' stroke-width='2.66667' stroke-linecap='round' stroke-linejoin='round' />
              </svg>
            </button>
            <span class="flex items-center justify-center size-8">${
              product.quantity
            }</span>
            <button type="button" onclick="increaseProductQuantity(${
              product.barcode
            })" class="items-center p-2 bg-[#EDEDED] cursor-pointer select-none">
              <svg class="w-5 h-5" width='24' height='24' viewBox='0 0 24 24' fill='none'
              xmlns='http://www.w3.org/2000/svg'>
              <rect width='24' height='24' />
              <path d='M18 12.998H13V17.998C13 18.2633 12.8946 18.5176 12.7071 18.7052C12.5196 18.8927 12.2652 18.998 12 18.998C11.7348 18.998 11.4804 18.8927 11.2929 18.7052C11.1054 18.5176 11 18.2633 11 17.998V12.998H6C5.73478 12.998 5.48043 12.8927 5.29289 12.7052C5.10536 12.5176 5 12.2633 5 11.998C5 11.7328 5.10536 11.4785 5.29289 11.2909C5.48043 11.1034 5.73478 10.998 6 10.998H11V5.99805C11 5.73283 11.1054 5.47848 11.2929 5.29094C11.4804 5.1034 11.7348 4.99805 12 4.99805C12.2652 4.99805 12.5196 5.1034 12.7071 5.29094C12.8946 5.47848 13 5.73283 13 5.99805V10.998H18C18.2652 10.998 18.5196 11.1034 18.7071 11.2909C18.8946 11.4785 19 11.7328 19 11.998C19 12.2633 18.8946 12.5176 18.7071 12.7052C18.5196 12.8927 18.2652 12.998 18 12.998Z' fill='currentColor'
                      />
              </svg>
            </buttont>
          </div>
          <button type="button" onclick="handleSelectProduct(${
            product.barcode
          })" class="button-red-ghost-sm h-8 px-4 w-max justify-self-center" >Xoá</button>
        </div>
      `;
    selectedProductsSummary.innerHTML += `
      <div class="grid grid-cols-[3fr_30px_2fr] items-center">
        <span class="text-md font-medium text-wrap">${product.name}</span>
        <span class="justify-self-center">${product.quantity}</span>
        <span class="font-medium justify-self-end">${formatCurrency(
          product.quantity * product.retail_price
        )}</span>
      </div>
      `;
  });
}

function renderSearchProducts() {
  searchProductList.innerHTML = "";
  productsShow.forEach((product) => {
    const isSelected =
      selectedProductsGlobal
        .map((i) => i.barcode)
        .findIndex((i) => i == product.barcode) != -1;
    searchProductList.innerHTML += `
    <div class="flex flex-col gap-1.5">
      <div class="grid grid-cols-[4fr_8fr] items-center p-2 border rounded ">
        <div class="flex items-center gap-1.5">
          <img class="w-10"
            src="${product.image_url}"
            alt="${product.name}" loading="lazy">
          <div class="flex flex-col gap-1.5">
            <span class="text-base font-medium">${product.name}</span>
            <span class="font-semibold">${formatCurrency(
              product["retail_price"]
            )}</span>
          </div>
        </div>
        <button type="button" class="button-${
          !isSelected ? "primary" : "red"
        }-ghost-sm h-8 px-4 w-max justify-self-end" onclick="handleSelectProduct(${
      product.barcode
    })">${!isSelected ? "Chọn" : "Xoá"}</button>
      </div>
    </div>
    `;
  });
}

function handleEmptySelectedProducts() {
  selectedProducts.innerHTML = "";
  selectedProductsSummary.innerHTML = "";
  selectedProducts.innerHTML += `<div class="w-full h-20 flex items-center justify-center border">Hiện tại chưa có sản phẩm được chọn!</div>`;
  selectedProductsSummary.innerHTML += `<div class="w-full h-10 flex items-center justify-center border">Hiện tại chưa có sản phẩm được chọn!</div>`;
  totalAmountSummary.textContent = formatCurrency(0);
  totalAmountCustomerSummary.textContent = formatCurrency(0);
  changeAmountCustomerSummary.textContent = formatCurrency(0);
}

async function getInfoCustomer() {
  btnCheckInfoCustomer.classList.add("hidden");
  try {
    const res = await fetch(
      `/customers/info?phone_number=${inputCustomerPhone.value}`
    );
    const data = await res.json();
    if (data.status === 200) {
      inputCustomerName.value = data.customer.full_name;
      inputCustomerAddress.value = data.customer.address;
      customerNameLabel.textContent = data.customer.full_name;
      customerAddressLabel.textContent = data.customer.address;
      formFieldCustomerName.classList.add("!opacity-100");
      formFieldCustomerName.classList.add("!visible");
      formFieldCustomerAddress.classList.add("!opacity-100");
      formFieldCustomerAddress.classList.add("!visible");
      inputCustomerName.setAttribute("disabled", true);
      inputCustomerName.setAttribute("readonly", true);
      inputCustomerAddress.setAttribute("disabled", true);
      inputCustomerAddress.setAttribute("readonly", true);
    } else {
      inputCustomerName.value = "";
      inputCustomerAddress.value = "";
      customerNameLabel.textContent = "";
      customerAddressLabel.textContent = "";
      formFieldCustomerName.classList.add("!opacity-100");
      formFieldCustomerName.classList.add("!visible");
      formFieldCustomerAddress.classList.add("!opacity-100");
      formFieldCustomerAddress.classList.add("!visible");
      inputCustomerName.removeAttribute("disabled");
      inputCustomerName.removeAttribute("readonly");
      inputCustomerAddress.removeAttribute("disabled");
      inputCustomerAddress.removeAttribute("readonly");
    }
  } catch (error) {}
}

async function postJSON() {
  try {
    const productsListBuy = [
      ...selectedProductsGlobal.map((product) => ({
        barcode: product.barcode,
        quantity: product.quantity,
      })),
    ];
    // const productsListBuy = [...selectedProductsGlobal];

    const response = await fetch("/transactions", {
      method: "POST", // or 'PUT'
      headers: {
        "Content-Type": "application/json;charset=UTF-8",
      },
      body: JSON.stringify({
        customer: {
          full_name: inputCustomerName.value,
          address: inputCustomerAddress.value,
          phone_number: inputCustomerPhone.value,
        },
        paid_amount: inputTotalAmount.value,
        productsListBuy: productsListBuy,
      }),
    });

    const data = await response.json();
    if (data.status !== 201) {
      return;
    }

    btnSubmit.setAttribute("disabled", true);
    const toast = document.getElementById("toast");
    const toastTitle = document.getElementById("toast-title");
    const toastContent = document.getElementById("toast-content");
    toastTitle.textContent = "Tạo đơn hàng thành công";
    toastContent.textContent = "Di chuyển đến trang chi tiết sau 3s.";
    toast.classList.add("md:right-5");
    toast.classList.add("right-4");
    setTimeout(() => {
      toast.classList.remove("md:right-5");
      toast.classList.remove("right-4");
      toastTitle.textContent = "";
      toastContent.textContent = "";
      window.location.replace(
        `${window.location.origin}/transaction?id=${data.data}`
      );
    }, 3000);
  } catch (error) {}
}

function sumSelectedProducts() {
  return selectedProductsGlobal.reduce(
    (sum, product) => sum + product.retail_price * product.quantity,
    0
  );
}

function isCanSubmitForm() {
  const totalProductsPrice = sumSelectedProducts();
  const isCanSubmit =
    inputCustomerPhone.value.trim().length > 0 &&
    inputCustomerPhone.value.trim().match(PATTERN_VALIDATE_PHONE) &&
    inputCustomerName.value.trim().length > 0 &&
    inputCustomerAddress.value.trim().length > 0 &&
    selectedProductsGlobal.length > 0 &&
    +inputTotalAmount.value >= totalProductsPrice;
  btnSubmit.setAttribute("disabled", !isCanSubmit);
  if (!isCanSubmit) {
    btnSubmit.setAttribute("disabled", true);
    return;
  }

  btnSubmit.removeAttribute("disabled");
}

(function () {
  handleEmptySelectedProducts();
  !isCanSubmitForm();
})();
