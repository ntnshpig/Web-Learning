class Timer {
    constructor(id, delay, counter){
        this.id = id;
        this.delay = delay;
        this.counter = counter;
    }
    start() {
        console.log(`Timer ${this.id} started (delay=${this.delay},  stopCount=${this.counter})`);
        let current_cicle = 1;
        let interval = setInterval(() => {
            this.tick(current_cicle, interval);
            current_cicle++;
        }, this.delay);
    }
    tick(cicle, interval) {
        console.log(`Timer ${this.id} Tick! | cycles left ${this.counter-cicle}`);
        if(this.counter == cicle) {
            this.stop(interval);
        }
    }
    stop(interval) {
        console.log(`Timer ${this.id} stopped`);
        clearInterval(interval);
    }
}

const runTimer = (id, delay, counter) => {
    let time = new Timer(id, delay, counter);
    time.start();
}

//runTimer("Bleep", 1000, 5);