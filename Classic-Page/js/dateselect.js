var calendarDay = document.querySelectorAll(".date .day");
var siteDayInfo = document.querySelector(".site-info");
var siteDayInfoCntr = document.querySelector("#site-info-cntr");
var siteOrderInfo = document.querySelector(".site-order");
var headerDate = document.querySelector(".calendar-date");
var headerDay = document.querySelector(".calendar-day");
var headerMonth = document.querySelector(".calendar-month");
var headerYear = document.querySelector(".calendar-year");
var orderSummaryInfo = document.querySelector(".order-summary");

var orderSummaryDate = document.querySelector(".site-date .date")
var orderSummaryDay = document.querySelector(".site-date .day")
var orderSummaryMonth = document.querySelector(".site-date .month");
var orderSummaryYear = document.querySelector(".site-date .year")
var orderSummaryTouristSite = document.querySelectorAll(".order-site-name");

var OrderSummary = {
    package_ids: [],
    package_counts: [],
    booking_dates: []
};




var currIndex;
var currIndex1;

var weekDaysArr = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

for (var i = 0; i < 31; i++) {
    calendarDay[i].addEventListener("click", function (e) {
        target = e.target;
        currIndex = Array.prototype.indexOf.call(calendarDay, target)


        calendarDay[currIndex].classList.add("today_styles");
        selectedDay = target.innerText;

        headerDate.innerText = selectedDay + "th";
        headerMonth.innerText = montharr[currMonth];
        headerYear.innerText = currYear;
        selectedWeekDay = weekDaysArr[new Date(
            currYear, currMonth, selectedDay
        ).getDay()]
        headerDay.innerText = selectedWeekDay;


        var clone = siteDayInfo.cloneNode(true);
        var siteName = clone.querySelectorAll(".tourist-site .site-name");
        var siteDesc = clone.querySelectorAll(".tourist-site .site-desc");
        var siteStartTime = clone.querySelectorAll(".start-time");
        var siteEndTime = clone.querySelectorAll(".end-time");

        // Code for displaying data from the database
        for (let index = 0; index < obj[selectedWeekDay].length; index++) {
            siteName[index].innerText = obj[selectedWeekDay][index].Site_Name
            siteDesc[index].innerText = obj[selectedWeekDay][index].Description
            siteStartTime[index].innerText = obj[selectedWeekDay][index].Start_Time.slice(0, 5)
            siteEndTime[index].innerText = obj[selectedWeekDay][index].End_Time.slice(0, 5)

        }

        clone.classList.remove("hidden");
        siteDayInfoCntr.insertBefore(clone, null);      //adding different touristic sites here

        //Order summary scripting begins here
        var checkBtn = clone.querySelector(".form-check-input");
        var touristSiteName;

        checkBtn.addEventListener("change", function (e) {       //event listener for the check button

            target = e.target;
            if (checkBtn.checked) {
                orderSummaryInfo.classList.remove("hidden");
                orderSummaryDay.innerText = checkBtn.parentNode.parentNode.querySelector(".calendar-day").innerText;
                orderSummaryDate.innerText = checkBtn.parentNode.parentNode.querySelector(".calendar-date").innerText;
                orderSummaryMonth.innerText = checkBtn.parentNode.parentNode.querySelector(".calendar-month").innerText;
                orderSummaryYear.innerText = checkBtn.parentNode.parentNode.querySelector(".calendar-year").innerText;
                checkBtn.parentNode.parentNode.querySelector(".package_id_index").innerText = OrderSummary.package_ids.length;

                //data for the JSON
                OrderSummary.package_ids.push(obj[checkBtn.parentNode.parentNode.querySelector(".calendar-day").innerText][0].Package_ID);
                OrderSummary.package_counts.push(1);
                console.log(orderSummaryYear.innerText,  Array.prototype.indexOf.call(montharr, orderSummaryMonth.innerText)  ,parseInt(orderSummaryDate.innerText))
                OrderSummary.booking_dates.push(new Date(orderSummaryYear.innerText,  Array.prototype.indexOf.call(montharr, orderSummaryMonth.innerText) ,parseInt(orderSummaryDate.innerText)));


                touristSiteName = checkBtn.parentNode.parentNode.parentNode.querySelectorAll(".tourist-site .site-name");
                for (i = touristSiteName.length - 1; i >= 0; i--) {
                    orderSummaryTouristSite[i].innerText = touristSiteName[i].innerText;
                }

                var clone1 = siteOrderInfo.cloneNode(true);
                clone1.classList.remove("hidden");
                var totalSection = document.querySelector(".total");
                console.log(totalSection)
                totalSection.classList.remove("hidden");

                clone1.setAttribute('id', `order${OrderSummary.package_ids.length - 1}`);


                clone1.querySelector(".plus").addEventListener("click", function () {

                    var num = clone1.querySelector(".num");
                    var a = parseInt(num.innerText);
                    a++;
                    OrderSummary.package_counts[parseInt(checkBtn.parentNode.parentNode.querySelector(".package_id_index").innerText)] = a;
                    a = (a < 10) ? "0" + a : a;
                    num.innerText = a;
                    var price = clone1.querySelector(".price").innerText;
                    var total = document.querySelector(".total-pricing");
                    var initTotal = parseInt(total.innerText);
                    total.innerText = initTotal + parseInt(price.slice(4));
                })

                clone1.querySelector(".minus").addEventListener("click", function () {
                    var num = clone1.querySelector(".num");
                    var a = parseInt(num.innerText);
                    if (a > 1) {
                        a--;
                        OrderSummary.package_counts[parseInt(checkBtn.parentNode.parentNode.querySelector(".package_id_index").innerText)] = a;
                        a = (a < 10) ? "0" + a : a;
                        num.innerText = a;
                        var price = clone1.querySelector(".price").innerText;
                        var total = document.querySelector(".total-pricing");
                        var initTotal = parseInt(total.innerText);
                        total.innerText = initTotal - parseInt(price.slice(4));
                    }

                })



                orderSummaryInfo.insertBefore(clone1, null);
                var price = clone1.querySelector(".price").innerText;
                var total = document.querySelector(".total-pricing");
                var initTotal = parseInt(total.innerText);
                total.innerText = initTotal + parseInt(price.slice(4));

            }
            else {
                var package_id_index = checkBtn.parentNode.parentNode.querySelector(".package_id_index").innerText;
                var clone1 = orderSummaryInfo.querySelector("#order" + package_id_index);
                var num = clone1.querySelector(".num").innerText;
                var price = clone1.querySelector(".price").innerText;
                OrderSummary.package_counts[package_id_index] = 0;
                clone1.remove();
                var total = document.querySelector(".total-pricing");
                var initTotal = parseInt(total.innerText);
                total.innerText = initTotal - parseInt(num) * parseInt(price.slice(4));

            }

        })

    });

}






