class Notification {
    success() {
        Toast.fire({
            icon: "success",
            title: "Successfully Done",
        });
    }
    question(){
        Toast.fire({
            icon: "question",
            title: "Are you sure",
        });
    }
    error(){
        Toast.fire({
            icon: "error",
            title: "Something went wrong !",
        });
    }
    warning(){
        Toast.fire({
            icon: "warning",
            title: "Oops..! worng",
        });
    }
    image_validation(){
        Toast.fire({
            icon: "error",
            title: "Upload image size less then 1mb",
        })
    }
}

export default new Notification();