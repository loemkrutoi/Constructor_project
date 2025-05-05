function showHiddenPass(target){
	let passInput = document.querySelectorAll('.password');
	passInput.forEach(btn => {
		if (btn.getAttribute('type') == 'password') {
			target.classList.add('view');
			btn.setAttribute('type', 'text');
		}
		else {
			target.classList.remove('view');
			btn.setAttribute('type', 'password');
		}
		return false;
	})
}