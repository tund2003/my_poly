const multiple = document.querySelector("#files").getAttribute("multiple");
avatarPreview = document.querySelector(".avatar-preview");
document.querySelector("#files").addEventListener("change", e => {
    if(avatarPreview) {
        avatarPreview.remove();
    }
    if(window.File && window.FileReader && window.FileList && window.Blob) {
        const files = e.target.files;
        const output = document.querySelector("#images-result");
        console.log(files);

        for (let i = 0; i < files.length; i++) {
            if(!files[i].type.match("image")) continue;
            const picReader = new FileReader();
            picReader.addEventListener("load", e => {
                const picFile = e.target;
                const div = document.createElement('div');
                div.innerHTML = `<img class="avatar-preview" src="${picFile.result}" title="${picFile.name}"/>`;
                if(multiple == null) {
                    if (output.hasChildNodes()) {
                        output.removeChild(output.childNodes[0]);
                        output.appendChild(div);
                    }
                } else {
                    div.innerHTML = `<img class="thumbnail" src="${picFile.result}" title="${picFile.name}"/>`;
                    output.appendChild(div);
                }
            })
            picReader.readAsDataURL(files[i]);
        }
    } else {
        alert("Your browser does not support the file API");
    }
})
