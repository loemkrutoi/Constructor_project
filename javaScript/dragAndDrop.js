let pagesLists = document.querySelectorAll('.pagesList');
let draggables = document.querySelectorAll('.draggable');
let kostal;
draggables.forEach(draggable => {
    draggable.addEventListener('dragstart', () => {
        draggable.classList.add('dragging');
    });
    draggable.addEventListener('dragend', (e) => {
        draggable.classList.remove('dragging');
        window.location.href="/javaScript/saveOrder.php?to="+draggable.querySelector('a').textContent+"&from="+kostal;
    });
});
pagesLists.forEach(pageList => {
    pageList.addEventListener('dragover', event => {
        event.preventDefault();
        let afterElement = dragAfter(pageList, event.clientY);
        let draggable = document.querySelector('.dragging');
        if(afterElement == null){
            pageList.appendChild(draggable);
        } else {
            pageList.insertBefore(draggable, afterElement);
        }
    })
});
function dragAfter(pageList, y){
    let draggableElements = [...pageList.querySelectorAll('.draggable:not(.dragging)')];
    return draggableElements.reduce((closest, child) => {
        let box = child.getBoundingClientRect();
        let offset = y - box.top - box.height / 2;
        if (offset < 0 && offset > closest.offset){
            kostal=child.querySelector("a").textContent;
            return {offset: offset, element: child};
        } else {
            return closest;
        }
    }, {offset: Number.NEGATIVE_INFINITY}).element;
}