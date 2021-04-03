function houseBlueprint(address, description, owner, size) {
    this.address = address;
    this.date = new Date(Date.now());
    this.description = description;
    this.owner = owner;
    this.size = size;
    this._averageBuildSpeed = 0.5;
    this.getDaysToBuild = function() {
        return this._averageBuildSpeed * 4 * this.size
    };
}

function HouseBuilder(address, description, owner, size, rooms) {
    houseBlueprint.call(this, address, description, owner, size);
    this.roomCount = rooms;
}
