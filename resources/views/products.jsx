import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/clinic-app-layout';
import { Head, router ,Link } from '@inertiajs/react';
import {CircleX, Pencil, Plus} from 'lucide-react';
import ProductForm from './products/ProductForm';
import {
    Table,
    TableBody,
    TableCaption,
    TableCell,
    TableFooter,
    TableHead,
    TableHeader,
    TableRow,
  } from "@/components/ui/table"
const breadcrumbs = [
    {
        title: 'Product clinic',
        href: '/product',
    },
];

export default function Products({products}) {
    function handleDelete(productId) {
        if (confirm('Are you sure you want to delete this product?')) {
            router.delete(route('clinic.products.destroy', productId));
        }
    }

    function handleEdit(productId) {
        router.get(route('clinic.products.edit', productId));
    }

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Product" />

            <ProductForm />
            <button><Plus />Add Product</button>
            <Table>
                <TableCaption>A list of your products.</TableCaption>
                <TableHeader>
                    <TableRow>
                        <TableHead className="w-[100px]">Name</TableHead>
                        <TableHead>Description</TableHead>
                        <TableHead>Price</TableHead>
                        <TableHead className="text-right">Stock</TableHead>
                        <TableHead className="text-right">Actions</TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    {products.map((product) => (
                        <TableRow key={product.id}>
                            <TableCell className="font-medium">{product.name}</TableCell>
                            <TableCell>{product.description.slice(0, 55)+"..."}</TableCell>
                            <TableCell>{product.price}</TableCell>
                            <TableCell className="text-right">{product.stock}</TableCell>
                            <TableCell className="text-right">
                                <div className="flex items-center justify-end gap-2">
                                    <button
                                        onClick={() => handleDelete(product.id)}
                                        className="text-red-500 hover:text-red-700 transition-colors"
                                    >
                                        <CircleX className="h-5 w-5" />
                                    </button>
                                    <button
                                        onClick={() => handleEdit(product.id)}
                                        className="text-blue-500 hover:text-blue-700 transition-colors"
                                    >
                                        <Pencil className="h-5 w-5" />
                                    </button>
                                </div>
                            </TableCell>
                        </TableRow>
                    ))}
                </TableBody>
            </Table>
        </AppLayout>
    );
}
