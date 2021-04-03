class Node {
    constructor(data) {
        this.data = data;
        this.next = null;
    }
};

export class LinkedList {
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