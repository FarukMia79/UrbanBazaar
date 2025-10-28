class Notification{
success() {
        Toast.fire({
            icon: "success",
            title: "Successfully Done",
        });
    }
}

export default new Notification();