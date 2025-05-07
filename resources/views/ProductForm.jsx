import { Button } from "@/components/ui/button"
import {Dialog,DialogContent,DialogDescription,DialogFooter,DialogHeader,DialogTitle,} from "@/components/ui/dialog"
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
    console.log('errors',errors);
  return (
    <Dialog open={open} onOpenChange={setOpen}>
      <DialogContent className="sm:max-w-[425px]">
        <DialogHeader>
          <DialogTitle>
                        {selectedProduct ? 'Edit Product' : 'Create New Product'}
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
                
                className="col-span-3" />
            {errors.name && <span className="mt-1 text-sm text-red-500 whitespace-nowrap">{errors.name}</span>}
          </div>
          <div className="grid grid-cols-4 items-center gap-4">
            <Label htmlFor="description" className="text-right">
              description
            </Label>
            <Input id="description" value={data.description}
                onChange={(e) => setData('description', e.target.value)}
                onFocus={() => clearErrors('description')}
                
                className="col-span-3" />
            {errors.description && <span className="mt-1 text-sm text-red-500 whitespace-nowrap">{errors.description}</span>}
          </div>
          <div className="grid grid-cols-4 items-center gap-4">
            <Label htmlFor="price" className="text-right">
              price
            </Label>
            <Input id="price" value={data.price} className="col-span-3" 
                onChange={(e) => setData('price', e.target.value)}
                onFocus={() => clearErrors('price')}
                 />
            {errors.price && <span className="mt-1 text-sm text-red-500 whitespace-nowrap">{errors.price}</span>}
          </div>
          <div className="grid grid-cols-4 items-center gap-4">
            <Label htmlFor="stock" className="text-right">
              stock
            </Label>
            <Input id="stock" value={data.stock} className="col-span-3" 
                onChange={(e) => setData('stock', e.target.value)}
                onFocus={() => clearErrors('stock')}
                 />                        
            {errors.stock && <span className="mt-1 text-sm text-red-500 whitespace-nowrap">{errors.stock}</span>}
          </div>
        </div>
        <DialogFooter>
                        <Button type="button" onClick={() => setOpen(false)}>
                            Cancel
                        </Button>
                        <Button type="submit" disabled={processing}>
                            {selectedProduct ? 'Update':'Create'}
                        </Button>
        </DialogFooter>
       </form>
      </DialogContent>
    </Dialog>
  )
}

export default ProductForm;
