import { DataTable } from '@/components/data-table';
import { Button } from '@/components/ui/button';
import { useDirection } from '@/context/DirectionProvider';
import { useLang } from '@/hooks/Lang';
import AppLayout from '@/layouts/admin-app-layout';
import { Head, useForm } from '@inertiajs/react';
import { Plus } from 'lucide-react';
import { useState } from 'react';
import { toast } from 'sonner';
import { CitiesColumns } from './cities/cities-columns';
import CityForm from './cities/city-form';
import DeleteDialog from './cities/delete-dialog';

export default function Cities({ cities }) {
    const [openDialog, setOpenDialog] = useState(false);
    // const [openDeleteDialog, setOpenDeleteDialog] = useState(false);
    const [selectedProduct, setSelectedProduct] = useState(null);

    const { direction } = useDirection();

   // const deleteMessage = 'The Product was successfully deleted';

    const {
        data,
        setData,
        post,
        patch,
        delete: destroy,
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

    // const handleOpenDelete = (product) => {
    //     setSelectedProduct(product);
    //     setOpenDeleteDialog(product);
    // };

    // const handleDelete = () => {
    //     destroy(route('clinic.products.delete', selectedProduct.id), {
    //         onSuccess: () => {
    //             toast.success(deleteMessage);
    //             setOpenDeleteDialog(false);
    //         },
    //     });
    // };

    return (
        <AppLayout header={__('Cities')}>
            <Head title={__('Cities')} />
            <div className="mx-auto mt-10 max-w-7xl">
                <div className="mb-5 flex flex-col items-start justify-between gap-4 md:flex-row md:items-end">
                    <h1 className="text-3xl font-bold">{__('Cities')}</h1>
                    <Button onClick={() => handleOpenForm(null)}>
                        <Plus className="mr-2 h-4 w-4" /> Add Product
                    </Button>
{/*                 </div>
                <DataTable
                    columns={CitiesColumns({
                        handleOpenForm,
                        handleOpenDelete,
                        __,
                    })}
                    data={cities}
                    filtering={{
                        columns: ['name', 'name_ar'],
                        placeholder: __('Search city...'),
                    }}
                    direction={direction}
                />
            </div> */}

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
{/*             <DeleteDialog
                open={openDeleteDialog}
                setOpen={setOpenDeleteDialog}
                handleDelete={handleDelete}
                processing={processing}
                direction={direction}
            /> */}
        </AppLayout>
    );
}
