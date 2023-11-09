function setupButtons(minusBtnId, numFibraId, plusBtnId) {
    const value = document.getElementById(numFibraId);
    const plusButton = document.getElementById(plusBtnId);
    const minusButton = document.getElementById(minusBtnId);
  
    plusButton.addEventListener('click', () => clicarAdd(value));
    minusButton.addEventListener('click', () => clicarMinus(value));
  
    let count = 0;
  
    function clicarAdd(valueElement) {
      count += 1;
      updateValue(valueElement);
    }
  
    function clicarMinus(valueElement) {
      if (count > 0) {
        count -= 1;
        updateValue(valueElement);
      }
    }
  
    function updateValue(valueElement) {
      valueElement.value = count;
    }
  }
  
  // Conjunto 1
  setupButtons('minusBtn1', 'num_fibra1', 'plusBtn1');
  
  // Conjunto 2
  setupButtons('minusBtn2', 'num_fibra2', 'plusBtn2');

  // Conjunto 3
  setupButtons('minusBtn3', 'num_fibra3', 'plusBtn3');
  
  // Conjunto 4
    setupButtons('minusBtn4', 'num_fibra4', 'plusBtn4');
      
  // Conjunto 5
  setupButtons('minusBtn5', 'num_fibra5', 'plusBtn5');
    
  // Conjunto 6
  setupButtons('minusBtn6', 'num_fibra6', 'plusBtn6');
    
  // Conjunto 7
  setupButtons('minusBtn7', 'num_fibra7', 'plusBtn7');

  // Conjunto 8
  setupButtons('minusBtn8', 'num_fibra8', 'plusBtn8');
    
  // Conjunto 8
  setupButtons('minusBtn9', 'num_fibra9', 'plusBtn9');
    
  // Conjunto 10
  setupButtons('minusBtn10', 'num_fibra10', 'plusBtn10');
    
  // Conjunto 11
  setupButtons('minusBtn11', 'num_fibra11', 'plusBtn11');
