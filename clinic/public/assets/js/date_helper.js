/**
 * A JavaScript function that will convert the numerical
 * index of a month into its textual equivalent
 *
 * @param monthIndex int The result of the getMonth() method.
 * @returns string
 */
 function getMonthName(monthIndex){
    //An array containing the name of each month.
    var months = [
        "January", "February", "March", "April", "May",
        "June", "July", "August", "September", "October",
        "November", "December"
    ];
    return months[monthIndex-1];
}