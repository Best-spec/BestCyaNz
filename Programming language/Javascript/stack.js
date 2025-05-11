class Stack {
    constructor() {
        this.data = [];
        this.top = 0;
    }
    push(element) {
        this.data[this.top] = element;
        this.top++;
    }
    pop() {
        if (this.top === 0) {
            return undefined;
        }
        this.top--;
        return this.data.pop();
    }
    peek() {
        return this.data[this.top - 1];
    }
    length() {
        return this.top;
    }
    isEmpty() {
        return this.top === 0;
    }
    print() {
        let top = this.top - 1;
        while (top >= 0) {
            console.log(this.data[top]);
            top--;
        }
    }
}

const stack = new Stack();
stack.push("best");
stack.push("programming");
stack.print();