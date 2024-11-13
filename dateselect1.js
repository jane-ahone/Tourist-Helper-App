var calendarDay = document.querySelectorAll(".date .day");
var siteDayInfo = document.querySelector(".form-example");
var siteDayInfoCntr = document.querySelector(".form-example-cntr");

var index = 0;

while (index < Object.keys(obj).length) {
    var clone = siteDayInfo.cloneNode(true);
    var siteName = clone.querySelector(".form-example label");
    var checkBtn = clone.querySelector(".form-check-input");
    checkBtn.setAttribute("id", "name" + (index + 1));
    siteName.setAttribute("for", "name" + (index + 1));
    siteName.innerText = Object.keys(obj)[index];
    clone.classList.remove("hidden");
    siteDayInfoCntr.insertBefore(clone, null);      //adding different touristic sites here
    // siteDesc[index].innerText = obj[selectedWeekDay][index].Description
    index++
    // siteStartTime[index].innerText = obj[selectedWeekDay][index].Start_Time.slice(0, 5)
    // siteEndTime[index].innerText = obj[selectedWeekDay][index].End_Time.slice(0, 5)
}


var selectedDay;
var selectedWeekDay;
var selectedMonth;
var currIndex;

//Selecting date
for (var i = 0; i < 31; i++) {
    calendarDay[i].addEventListener("click", function (e) {
        target = e.target;
        currIndex = Array.prototype.indexOf.call(calendarDay, target)
        calendarDay[currIndex].classList.add("today_styles");
        selectedDay = target.innerText;
        selectedMonth = montharr[currMonth];
        selectedYear = currYear;
        selectedWeekDay = weekDaysArr[new Date(
            currYear, currMonth, selectedDay
        ).getDay()]

    });
}

//Selecting touristic site
var orderSummaryTouristSite = document.querySelectorAll(".order-site-name");
var orderSummaryInfo = document.querySelector(".order-summary");
var orderSiteName = document.querySelector("order-site-name")

var checkBtn = document.querySelectorAll(".form-check-input");
var touristSiteName;
console.log(checkBtn);

for(i=0;i<checkBtn.length;i++){

checkBtn[i].addEventListener("change",function(e){
    target = e.target; //specific checkbox that was clicked
    currIndex1 = Array.prototype.indexOf.call(checkBtn,target); //index of the aforementioned checkbox in array checkbtn

    if (checkBtn[currIndex1].checked ) {
        var siteName = target.parentNode.querySelector("form"); //getting site name affiliated to checkbox

        orderSummaryInfo.classList.remove("hidden");
        orderSummaryDay.innerText = selectedDay;
        orderSummaryDate.innerText = selectedWeekDay;
        orderSummaryMonth.innerText = selectedMonth;
        orderSummaryYear.innerText = selectedYear;
        clone2 = orderSiteName.cloneNode(false);
        clone2.innerText = siteName



    }
}





})