function characterLimit(e){
    let title = document.getElementById('title').value;
    let description = document.getElementById('description').value;
    let boxes = document.getElementById('boxes');
    let descriptionField = document.getElementById('description');
    let postButton = document.getElementById('post_blog');
    if(title.length>255 || description.length>255){
        e.preventDefault();
        if(title.length>255){
            notify.textContent = 'Field exceeded the character limit(255) \n Current number of charcaters: ' + title.length;
            boxes.insertBefore(notify, descriptionField);
        }
        else if(description.length>255){
            notify.textContent = 'Field exceeded the character limit(255) \n Current number of charcaters: ' + description.length;
            boxes.insertBefore(notify, postButton);
        }
    }
}

function confirmClear(e){
    let text = "Are you sure you want to clear the blog?";
    if(confirm(text) == false){
        e.preventDefault();
    }
}

var exceeded = document.createTextNode('Field exceeded the character limit(255)');
var notify = document.createElement('div');
notify.appendChild(exceeded);
notify.classList.add('exceeded');

let postBlog = document.getElementById('postBlog');
postBlog.addEventListener('click', characterLimit);

let clearBlog = document.getElementById('clearBlog');
clearBlog.addEventListener('click', confirmClear);
