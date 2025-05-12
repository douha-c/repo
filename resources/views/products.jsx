import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/clinic-app-layout';
import { Button } from '@/components/ui/button';
import { Head, router, Link, useForm } from '@inertiajs/react';
import { useState } from 'react';
import { toast } from 'sonner';
import { CircleX, Pencil, Plus } from 'lucide-react';
import ProductForm from './products/ProductForm';
import {
    Select,
    SelectContent,
    SelectGroup,
    SelectItem,
    SelectLabel,
    SelectTrigger,
    SelectValue,
} from "@/components/ui/select"
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

export default function Products({ categories, products }) {
    const [openDialog, setOpenDialog] = useState(false);
    const [selectedProduct, setSelectedProduct] = useState(null);
    const [selectedCategory, setSelectedCategory] = useState('all');
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

    // Filter products based on selected category
    const filteredProducts = selectedCategory === 'all'
        ? products
        : products.filter(product => product.category_id === selectedCategory);

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Product" />
            <div className="flex justify-between mb-4">
                <div className="flex justify-start mb-4">
                    <Select onValueChange={(value) => setSelectedCategory(value)}>
                        <SelectTrigger className="w-[180px]">
                            <SelectValue placeholder="All categories" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectLabel>Categories</SelectLabel>
                                <SelectItem value="all">All categories</SelectItem>
                                {categories.map((category) => (
                                    <SelectItem key={category.id} value={category.id}>
                                        {category.name}
                                    </SelectItem>
                                ))}
                            </SelectGroup>
                        </SelectContent>
                    </Select>
                </div>
                <div className="flex justify-end mb-4">
                    <Button onClick={() => handleOpenForm(null)}>
                        <Plus className="mr-2 h-4 w-4" /> Add Product
                    </Button>
                </div>
            </div>
            <Table>
                <TableHeader>
                    <TableRow>
                        <TableHead className="w-[100px]">Name</TableHead>
                        <TableHead className="text-right">Category</TableHead>
                        <TableHead>Description</TableHead>
                        <TableHead>Price</TableHead>
                        <TableHead className="text-right">Stock</TableHead>
                        <TableHead className="text-right">Actions</TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    {filteredProducts.length === 0 ? (
                        <TableRow>
                            <TableCell colSpan={6} className="text-center py-8">
                                <div className="flex flex-col items-center justify-center text-gray-500">
                                    <p className="text-lg font-medium">No products found</p>
                                    <p className="text-sm">There are no products in selected category</p>
                                </div>
                            </TableCell>
                        </TableRow>
                    ) : (
                        filteredProducts.map((product) => (
                            <TableRow key={product.id}>
                                <TableCell className="font-medium">{product.name}</TableCell>
                                <TableCell className="text-medium">{product.category.name}</TableCell>
                                <TableCell>{product.description.slice(0, 55) + "..."}</TableCell>
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
                        ))
                    )}
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
