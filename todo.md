GET - http://api-gateway-prod.drogasil.com.br/stock/v1/        
GET - http://api-gateway-prod.drogasil.com.br/price/v1/
POST - http://api-gateway-prod.drogasil.com.br/shipping/v1/
{
  "price": {
    "sku": 45086,
    "valueFrom": 11.99,
    "valueTo": 8.99,
    "traceId": "6d908e210dd869cd604a862a7c65bcf1"
  },
  "stock": {
    "sku": 45086,
    "qty": 11861,
    "traceId": "6d908e210dd869cd604a862a7c65bcf1"
  },
  "quoteShipping": {
    "value": 9.73,
    "baseCost": 9.73,
    "flow": "CD",
    "id": "2",
    "estimateDays": 2,
    "idSubsidiary": 3077,
    "origin": "intelipost",
    "label": {
      "default": "Rápida",
      "deadline": "Rápida - 2 dia(s) útil(eis)",
      "success": "Rápida - 2 dia(s) útil(eis)",
      "informative": "Rápida - 2 dia(s) útil(eis)"
    },
    "oms": {
      "carrier": 1,
      "service": 2
    },
    "shiftDelivery": [],
    "information": "Compre mais R$ 440 e ganhe frete grátis  para a região Sudeste e Centro Oeste. Demais regiões o frete é grátis para compras acima de R$ 450.",
    "scheduledDelivery": false,
    "traceId": "6d908e210dd869cd604a862a7c65bcf1"
  }
}
