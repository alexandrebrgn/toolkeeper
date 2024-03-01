export default function authHeader() {
    let user = JSON.parse(localStorage.getItem('user'));
    // console.log('AuthHeader - token() :', user.success.token);
    if (user && user.success.token) {
        return { Authorization: 'Bearer ' + user.success.token };
    } else {
        return {};
    }
}