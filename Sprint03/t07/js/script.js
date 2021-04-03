class Node {
    constructor(data) {
        this.data = data;
        this.next = null;
    }
};

class LinkedList {
    constructor() {
        this.head = null;
        this.length = 0;
    }

    add(value) {
        let node = new Node(value);

        if(this.head == null) {
            this.head = node;
        } else {
            let current = this.head;
            while(current.next != null){
                current = current.next;
            }
            current.next = node;
        }
        this.length++;
    }
    remove(value) {
        let current = this.head;
        let prevNode = null;

        while (current != null) {
            if (current.data === value) {
                if (prevNode == null) {
                    this.head = current.next;
                } else {
                    prevNode.next = current.next;
                }
                this.length--;
            }
            prevNode = current;
            current = current.next;
        }
    }
    contains(value) {
        if(this.length === 0) return false;
        let current = this.head;

        while(current) {
            if(current.data == value) {
                return true;
            }
            current = current.next;
        }
        return false;
    }
    *[Symbol.iterator] () {
        let current = this.head;
        while(current  != null) {
            yield current.data;
            current = current.next;
        }
    }
    clear() {
        while(this.head != null) {
            this.head = this.head.next;
        }
        length = 0;
    }
    count() {
        return this.length;
    }
    log() {
        let current;
        let str = "";
        if (this.head != null) {
            current = this.head;
            while(current) {
                str += current.data;
                if (current.next) str += ", ";
                current = current.next;
            }
        }
        console.log(str);
    }
}

const createLinkedList = (arr) => {
    let linkedList = new LinkedList;
    arr.forEach(element => {
        linkedList.add(element);
    });
    return linkedList;
};

/*const ll = createLinkedList([100, 1, 2, 3, 100, 4, 5, 100]);
ll.log();
//100, 1, 2, 3, 100, 4, 5, 100
ll.remove(100);
ll.log();
//1, 2, 3, 4, 5
ll.add(10);
ll.log();
//1, 2, 3, 4, 5, 10
console.log(ll.contains(10));
//true
let sum = 0;
for(const n of ll) {
    sum += n;
}
console.log(sum);
//25
console.log(ll.count());
//6
ll.clear();
ll.log();
//""*/