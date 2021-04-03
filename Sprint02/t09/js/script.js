const addZero = (date) => {
    return (date.toString().length === 1) ? String('0' + date) : date;
}

const getFormattedDate = (date) => {
    const dayNmaes = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
    console.log(`${addZero(date.getDate())}.${addZero(date.getMonth()+1)}.${date.getFullYear()} ${addZero(date.getHours())}:${addZero(date.getMinutes())} ${dayNmaes[date.getDay() - 1]}`);
};

// const date0= new Date(1993, 11, 1);
// const date1= new Date(1998, 0, -33);
// const date2= new Date('42 03:24:00');
// getFormattedDate(date0);
// getFormattedDate(date1);
// getFormattedDate(date2);