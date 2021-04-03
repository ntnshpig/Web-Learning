const houseMixin =  {
    wordReplace(willReplace, forRaplce) {
        this.description = this.description.replace(willReplace, forRaplce);
    },
    wordInsertAfter(replaced, forInsert) {
        let arr = [];
        arr = this.description.split(" ");
        arr.splice(arr.indexOf(replaced) + 1, 0, forInsert);
        this.description = arr.join(" ");
    },
    wordDelete(word) {       
        this.description = this.description.replace(word, '');
    },
    wordEncrypt() {
        this.description = this.description.replace(/[a-zA-Z]/g, function(c) { return String.fromCharCode(( c <= "Z" ? 90:122) >= ( c = c.charCodeAt(0)+13) ? c:c-26); });
    },
    wordDecrypt() {
        this.description = this.description.replace(/[a-zA-Z]/g, function(c) { return String.fromCharCode(( c <= "Z" ? 90:122) >= ( c = c.charCodeAt(0)+13) ? c:c-26); });
    }
};

Object.assign(HouseBuilder.prototype, houseMixin);

/*const house= new HouseBuilder('88 Crescent Avenue','Spacious town house with wood flooring, 2-car garage, and a back patio.','J. Smith',110,5);

console.log(house.description);
house.wordReplace("town", "village");
console.log(house.description);

house.wordInsertAfter("with", "marble");
console.log(house.description);

house.wordDelete("garage");
console.log(house.description);

house.wordEncrypt();
console.log(house.description);

house.wordDecrypt();
console.log(house.description);*/