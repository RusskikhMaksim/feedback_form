class Reviewer {
    constructor() {
        this.classNameActive = 'reviewed';
        this.text = 'Рассмотрено'
    }

    setClassToActive(id) {
        let elem = document.getElementById(id);
        console.log(elem);
        elem.classList.add(this.classNameActive);
        elem.innerText = this.text;
    }
};
const reviewer = new Reviewer();

