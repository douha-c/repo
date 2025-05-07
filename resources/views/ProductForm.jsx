import { Button } from "@/components/ui/button"
import {Dialog,DialogContent,DialogDescription,DialogFooter,DialogHeader,DialogTitle,DialogTrigger,} from "@/components/ui/dialog"
import { Input } from "@/components/ui/input"
import { Label } from "@/components/ui/label"
import { toast } from 'sonner';

export function ProductForm({ open, setOpen, selectedProduct, data, setData, post, patch, reset, errors, processing, clearErrors }) {
   const successMessage = selectedProduct
    ? 'The product has been successfully updated'
    : 'The product was successfully created';
      const handleSubmit = (e) => {
        e.preventDefault();
        if (selectedProduct) {
            patch(route('clinic.products.update', selectedProduct.id), {
                onSuccess: () => {
                    setOpen(false);
                     toast.success(successMessage);
                    reset();
                },
                onError: (errors) => {
                    console.log('update errors', errors);
                },
            });
        } else {
            post(route('clinic.products.store'), {
                onSuccess: () => {
                    setOpen(false);
                    toast.success(successMessage);
                    reset();
                },
                onError: (errors) => {
                    console.log('store errors', errors);
                },
            });
        }
    };
  return (
    <Dialog open={open} onOpenChange={setOpen}>
{/*       <DialogTrigger asChild>
        <Button variant="outline">Edit Pruduct</Button> 
      </DialogTrigger>   */}
      <DialogContent className="sm:max-w-[425px]">
        <DialogHeader>
          <DialogTitle>
                        {selectedCity ? 'Edit Product' : 'Create New Product'}
          </DialogTitle>
          <DialogDescription>
          </DialogDescription>
        </DialogHeader>
    <form onSubmit={handleSubmit} className="space-y-4">
        <div className="grid gap-4 py-4">
          <div className="grid grid-cols-4 items-center gap-4">
            <Label htmlFor="name" className="text-right">
              Name
            </Label>
            <Input id="name" value={data.name}
                onChange={(e) => setData('name', e.target.value)}
                onFocus={() => clearErrors('name')}
                required
                className="col-span-3" />
            {errors.name && <p className="mt-1 text-sm text-red-500">{errors.name}</p>}
          </div>
          <div className="grid grid-cols-4 items-center gap-4">
            <Label htmlFor="description" className="text-right">
              description
            </Label>
            <Input id="description" value={data.description}
                onChange={(e) => setData('description', e.target.value)}
                onFocus={() => clearErrors('description')}
                required
                className="col-span-3" />
            {errors.description && <p className="mt-1 text-sm text-red-500">{errors.description}</p>}
          </div>
          <div className="grid grid-cols-4 items-center gap-4">
            <Label htmlFor="price" className="text-right"
              price
            </Label>
            <Input id="price" value={data.price} className="col-span-3" 
                onChange={(e) => setData('price', e.target.value)}
                onFocus={() => clearErrors('price')}
                required>/>
            {errors.price && <p className="mt-1 text-sm text-red-500">{errors.price}</p>}
          </div>
          <div className="grid grid-cols-4 items-center gap-4">
            <Label htmlFor="stock" className="text-right">
              stock
            </Label>
            <Input id="stock" value={data.stock} className="col-span-3" 
                onChange={(e) => setData('stock', e.target.value)}
                onFocus={() => clearErrors('stock')}
                required>/>                        
            {errors.stock && <p className="mt-1 text-sm text-red-500">{errors.stock}</p>}
          </div>
        </div>
        <DialogFooter>
                        <Button type="button" onClick={() => setOpen(false)}>
                            Cancel
                        </Button>
                        <Button type="submit" disabled={processing}>
                            {selectedCity ? 'Update':'Create'}
                        </Button>
        </DialogFooter>
       </form>
      </DialogContent>
    </Dialog>
  )
}

export default ProductForm;
