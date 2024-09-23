# E-commerce Frontend

This is the frontend for an e-commerce platform, built using HTML, Bootstrap for styling, Axios for handling API requests, and vanilla JavaScript for rendering data and interactions with the backend API.

## Project Setup

### Prerequisites

- **Node.js** (optional, for serving the frontend)
- **PHP** (for running the Symfony API)
- **Symfony CLI** (to serve the Symfony API)

### Frontend Setup

1. Clone the repository and navigate to the project folder.

   ```bash
   git clone <repository_url>
   cd ecommerce-frontend
2. Install Axios via CDN (already included in the HTML).

In the <head> of your HTML files:

   ```bash
   <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
   ```

3. Ensure that your Symfony API is running.

 ```bash
symfony serve
```
## API Endpoints

The frontend communicates with the backend via the following API endpoints. All endpoints are served via the Symfony backend running on localhost:8000.

### Products

 - **List Products:** GET /api/products/list
 - **Create Products:** POST /api/products/create
 - **Edit Product:** PUT /api/products/edit/{id}
 - **Delete Product:** DELETE /api/products/delete/{id}

### Categories

- **List Categories:** GET /api/categories/list
- **Create Categories:** POST /api/categories/create
- **Edit Categories:** PUT /api/categories/edit/{id}
- **Delete Categories:** DELETE /api/categories/delete/{id}

### Customers

- **List Customers:** GET /api/customers/list
- **Create Customers:** POST /api/customers/create
- **Edit Customers:** PUT /api/customers/edit/{id}
- **Delete Customers:** DELETE /api/customers/delete/{id}

### Orders

- **List Orders:** GET /api/orders/list
- **Create Orders:** POST /api/orders/create
- **Edit Orders:** PUT /api/orders/edit/{id}
- **Delete Orders:** DELETE /api/orders/delete/{id}