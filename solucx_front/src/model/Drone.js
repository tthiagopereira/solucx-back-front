export default class Drone {
  constructor(id='',image='', name='', address='', battery='', max_speed='', average_speed='', status='',fly='') {
    this.id            = id;
    this.image         = image
    this.name          = name
    this.address       = address
    this.battery       = battery
    this.max_speed     = max_speed
    this.average_speed = average_speed
    this.status        = status
    this.fly           = fly
  }
}