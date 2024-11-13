var weekDaysArr = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
calendarDays = document.querySelectorAll(".date .day");
displayDate = document.querySelector(".header p");
var siteDayInfo = document.querySelector(".form-example");
var siteDayInfoCntr = document.querySelector(".form-example-cntr");

var selectedDate = -1;
var index = 0;

var transitOrderState = {};

for (var i = 0; i < calendarDays.length; i++) {

    calendarDays[i].addEventListener("click", function (e) {
        target1 = e.target;
        if (selectedDate != -1) {
            document.querySelector("#day" + selectedDate).classList.remove("today_styles");
        }
        selectedDate = target1.innerText;
        target1.classList.add("today_styles");
        selectedFullDate = new Date(currYear, currMonth, selectedDate);
        transitOrderState[selectedFullDate] = {
            elts: new Set(),
            counts: 1
        };
        selectedWeekDay = weekDaysArr[selectedFullDate.getDay()]
        displayDate.innerText = selectedWeekDay + ", " + selectedDate + "th " + montharr[currMonth] + " " + currYear;

        while (index < Object.keys(obj).length && index != Object.keys(obj).length) {
            var clone = siteDayInfo.cloneNode(true);
            var siteName = clone.querySelector(".form-example label");
            var checkBtn = clone.querySelector(".form-check-input");
            checkBtn.setAttribute("id", "name" + (index + 1));
            siteName.setAttribute("for", "name" + (index + 1));
            siteName.innerText = Object.keys(obj)[index];
            clone.classList.remove("hidden");
            siteDayInfoCntr.insertBefore(clone, null);
            index++;
        }

        var checkBtn = document.querySelectorAll(".form-check-input");


        for (i = 0; i < checkBtn.length; i++) {
            checkBtn[i].checked = false;
            checkBtn[i].addEventListener("change", function (e) {       //event listener for the check button
                targetBtn = e.target;
                currIndex1 = Array.prototype.indexOf.call(checkBtn, targetBtn);

                var siteNameChecked = targetBtn.parentNode.querySelector("label").innerText; //getting site name affiliated to checkbox
                if (checkBtn[currIndex1].checked) {
                    transitOrderState[selectedFullDate].elts.add(siteNameChecked);
                }
                else {
                    if (transitOrderState[selectedFullDate].elts.has(siteNameChecked)) {
                        transitOrderState[selectedFullDate].elts.delete(siteNameChecked);
                    }
                }
                console.log(transitOrderState);

            })

        }
    })
}

addOrderBtn = document.querySelector(".add-order-btn");
siteOrderDate = document.querySelector(".site-date .day")


siteOrderDate.innerText = displayDate.innerText;
//Order summary scripting begins here
var checkBtn = document.querySelectorAll(".form-check-input");
var orderSummaryInfo = document.querySelector(".order-summary");
var originalOrderSummary = orderSummaryInfo.cloneNode(true);

function renderOrderSummary() {
    parentNode = orderSummaryInfo.parentElement;
    orderSummaryInfo.remove();
    orderSummaryInfo = originalOrderSummary.cloneNode(true);
    // orderSummaryInfo.classList.remove("hidden");
    var siteOrder = orderSummaryInfo.querySelector(".site-order");
    var total = document.querySelector(".total-pricing");
    var totalPricing = 0;

    for (const dateKeys of Object.keys(transitOrderState)) {
        if(transitOrderState[dateKeys].elts.size ==0){
            continue;
        }
        clone = siteOrder.cloneNode(true);
        clone.querySelector(".site-date").innerText = new Date(dateKeys).toDateString();
        clone1 = clone.querySelector(".order-site-name");
        var siteDateDetails = clone.querySelector(".col1")
        var pricingDetails = clone.querySelector(".site-pricing");

        for (const dateSite of transitOrderState[dateKeys].elts) {
            tmpClone = clone1.cloneNode(true);
            tmpClone.innerText = dateSite;
            pricingDetails.innerText = parseInt(obj[dateSite][0].Price) + parseInt([pricingDetails.innerText]);

            tmpClone.classList.remove("hidden");
            siteDateDetails.insertBefore(tmpClone, null);
        }

        
        plus = clone.querySelector(".plus");
        plus.addEventListener("click", function () {
            transitOrderState[dateKeys].counts += 1;
            renderOrderSummary()
        })

        minus = clone.querySelector(".minus");
        minus.addEventListener("click", function () {
            transitOrderState[dateKeys].counts = transitOrderState[dateKeys].counts <=1? 1 : transitOrderState[dateKeys].counts -1;
            renderOrderSummary()
        })

        var num = clone.querySelector(".num");
        num.innerText = transitOrderState[dateKeys].counts;

        totalPricing += parseInt(pricingDetails.innerText) * transitOrderState[dateKeys].counts;

        clone.classList.remove("hidden");
        orderSummaryInfo.insertBefore(clone, null);
        orderSummaryInfo.classList.remove("hidden");
        parentNode.insertBefore(orderSummaryInfo, null);
    }
    total.innerText = totalPricing;
}

addOrderBtn.addEventListener("click", function () {
    renderOrderSummary();
})






