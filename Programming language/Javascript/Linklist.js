class Node {
    constructor(value){
        this.value = value;
        this.next = null;
    }
}

class Linklist {
    constructor(value) {
        const newNode = new Node(value);
        this.head = newNode;
        this.tail = this.head;
        this.length = 1
    }
    push(value) {
    const newNode = new Node(value);
    if (!this.head){
        this.head = newNode;
        this.tail = newNode;
    } else {
        this.tail.next = newNode;
        this.tail = newNode;
    }
    this.length++;
    return this;
    }
    pop() {
        if (!this.head) return undefined;
        let current = this.head;
        let pre = this.head;
        while (current.next) {
            pre = current;
            current = current.next;
        }
        this.tail = pre;
        this.tail.next = null;
        this.length--;
        if (this.length === 0) {
            this.head = null;
            this.tail = null;
        }
        return current;
    }
    shift() {
        if (!this.head) return undefined;
        const currentHead = this.head;
        this.head = this.head.next;
        this.length--;
        if (this.length === 0) {
            this.tail = null;
        }
        return currentHead;
    }
    unshift(value) {
        const newNode = new Node(value);
        if (!this.head) {
            this.head = newNode;
            this.tail = newNode;
        } else {
            newNode.next = this.head;
            this.head = newNode;
        }
        this.length++;
        return this;
    }
    get(index) {
        if (index < 0 || index >= this.length) return null;
        let current = this.head;
        for (let i = 0; i < index; i++) {
            current = current.next;
        }
        return current;
    }
    set(index, value) {
        const foundNode = this.get(index);
        if (foundNode) {
            foundNode.value = value;
            return true;
        }
        return false;
    }
    insert(index, value) {
        if (index < 0 || index > this.length) return false;
        if (index === 0) return !!this.unshift(value);
        if (index === this.length) return !!this.push(value);
        const newNode = new Node(value);
        const prevNode = this.get(index - 1);
        const temp = prevNode.next;
        prevNode.next = newNode;
        newNode.next = temp;
        this.length++;
        return true;
    }
    remove(index) {
        if (index < 0 || index >= this.length) return undefined;
        if (index === 0) return this.shift();
        if (index === this.length - 1) return this.pop();
        const prevNode = this.get(index - 1);
        const removed = prevNode.next;
        prevNode.next = removed.next;
        this.length--;
        return removed;
    }
    reverse() {
        let node = this.head;
        this.head = this.tail;
        this.tail = node;
        let next;
        let prev = null;
        for (let i = 0; i < this.length; i++) {
            next = node.next;
            node.next = prev;
            prev = node;
            node = next;
        }
        return this;
    }
    print() {
        const arr = [];
        let current = this.head;
        while (current) {
            arr.push(current.value);
            current = current.next;
        }
        console.log(arr);
    }
}