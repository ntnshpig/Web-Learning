String.prototype.removeDuplicates = function() {
    res = ""
    for(let el of this.split(' ')) {
        if(res.split(' ').indexOf(el) == -1){
            res = res.concat(el, ' ');
        }
    }
    return res.trim();
};

/*let str = "Giant Spiders?   What’s next? Giant Snakes?";
console.log(str);

str = str.removeDuplicates();
console.log(str);

str = str.removeDuplicates();
console.log(str);

str = ". . . . ? . . . . . . . . . . . ";
console.log(str);

str= str.removeDuplicates();
console.log(str);*/