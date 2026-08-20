`<div class="cart-item">

    <div class="d-flex justify-content-between">
        <div>
            <strong>
                ${item.name}
            </strong>
            <div class="small text-muted">${item.price.toLocaleString('id-ID')}</div>
        </div>

        <strong>
            Rp${(item.price * item.qty).toLocaleString('id-ID')}
        </strong>
    </div>

    <div class="d-flex align-items-center mt-3">
        <button onclick="decreaseItem(${item.id})" type="button" class="btn btn-outline-secondary quantity-btn">
            -
        </button>

        <span>${item.qty}</span>

        <button onclick="increaseItem(${item.id})" type="button" class="btn btn-outline-secondary quantity-btn">
            +
        </button>

        <button type="button" class="btn btn-sm btn-outline-danger ms-auto" onclick="removeItem(${item.id})">
            <i class="bi bi-trash"></i>
        </button>
    </div>

</div>`
