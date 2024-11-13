
function summaryData() {
    var form = document.getElementById("payment_form");
    const myJSON = JSON.stringify(OrderSummary); //data from frontend
    document.getElementById("order_details").value = myJSON;
    form.submit();
}