
function summaryData() {
    var form = document.getElementById("payment_form");
    const myJSON = JSON.stringify(
        transitOrderState,
        (_key, value) => (value instanceof Set ? [...value] : value)
      );//data from frontend
    document.getElementById("order_details").value = myJSON;
    form.submit();
}