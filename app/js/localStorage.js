var localStore = localStorage;

function storeLocalData(k, v){ // k -> key   v -> value
	localStore.setItem(k, v);
}

function getLocalData(k){
	return localStore.getItem(k);
}
