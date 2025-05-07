import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/clinic-app-layout';
import { Button } from '@/components/ui/button';
import { Head, router ,Link, useForm  } from '@inertiajs/react';
import { useState } from 'react';
import { toast } from 'sonner';
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
    const [openDialog, setOpenDialog] = useState(false);
    const [selectedProduct, setSelectedProduct] = useState(null);
    const {
        data,
        setData,
        post,
        patch,
        reset,
        errors,
        processing,
        clearErrors,
    } = useForm({
        name: '',
        description: '',
        price: '',
        stock: '',
    });
    const handleOpenForm = (product = null) => {
        setSelectedProduct(product);
        setData({
            name: product ? product.name : '',
            description: product ? product.description : '',
            price: product ? product.price : '',
            stock: product ? product.stock : '',
        });
        clearErrors();
        setOpenDialog(true);
    };
    function handleDelete(productId) {
        if (confirm('Are you sure you want to delete this product?')) {
            router.delete(route('clinic.products.destroy', productId));
        }
    }
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Product" />
            <div className="flex justify-end mb-4">
                <Button onClick={() => handleOpenForm(null)}>
                    <Plus className="mr-2 h-4 w-4" /> Add Product
                </Button>
            </div>
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
                                        onClick={() => handleOpenForm(product)}
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
            <ProductForm
                open={openDialog}
                setOpen={setOpenDialog}
                selectedProduct={selectedProduct}
                {...{
                    data,
                    setData,
                    post,
                    patch,
                    reset,
                    errors,
                    processing,
                    clearErrors,
                }}
            />
        </AppLayout>
    );
}
