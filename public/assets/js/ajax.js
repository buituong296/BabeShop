function updateQuantity(itemId, change = 0) {
    let input = document.getElementById(`quantity-${itemId}`);
    let newQuantity = parseInt(input.value) + change;
    if (newQuantity < 1) newQuantity = 1;

    input.value = newQuantity;

    fetch(`/cart/update-ajax/${itemId}`, {
        method: "PATCH",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
        },
        body: JSON.stringify({
            quantity: newQuantity,
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                document.getElementById(`total-price-${itemId}`).innerText =
                    data.totalPrice + " VND";
                document.querySelector("#order-summary-total").innerText =
                    data.totalAmount + " VND"; // Cập nhật tổng số tiền
                document.querySelector("#order-summary-final-total").innerText =
                    data.totalAfterDiscount + " VND"; // Cập nhật tổng thanh toán sau cùng

                // Cập nhật giảm giá
                const discountElements =
                    document.querySelectorAll("[id^='discount-']");
                discountElements.forEach((discountElement) => {
                    discountElement.innerText = `-${data.totalDiscount} VND`;
                });
            } else {
                alert(data.message);
            }
        })
        .catch((error) => console.error("Error:", error));
}

document.addEventListener("DOMContentLoaded", function () {
    const totalAmountElement = document.getElementById("order-summary-total");
    const finalTotalElement = document.getElementById(
        "order-summary-final-total"
    );
    const discountElements = document.querySelectorAll("[id^='discount-']");

    function updateDiscounts() {
        const totalAmount =
            parseFloat(totalAmountElement.textContent.replace(/,/g, "")) || 0;
        let totalDiscount = 0;

        discountElements.forEach((discountElement) => {
            const percentage =
                parseFloat(discountElement.getAttribute("data-percentage")) ||
                0;
            const discountAmount = totalAmount * (percentage / 100);
            discountElement.textContent = `-${discountAmount.toLocaleString()} VND`;
            totalDiscount += discountAmount;
        });

        const finalTotal = Math.max(totalAmount - totalDiscount, 0); // Không để giá trị âm
        finalTotalElement.textContent = `${finalTotal.toLocaleString()} VND`;

    }

    updateDiscounts(); // Gọi hàm này ban đầu khi trang load
});
