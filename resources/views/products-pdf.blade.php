<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="flex flex-col" data-hs-datatable='{
        "pageLength": 15,
        "scrollY": "470px",
        "pagingOptions": {
          "pageBtnClasses": "min-w-[40px] flex justify-center items-center text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none"
        }
      }'>
        <div class="overflow-x-auto min-h-[460px] ">
          <div class="min-w-full inline-block align-middle">
            <div class="overflow-hidden">
              <table class="min-w-full">
                <thead class="border-b border-gray-200">
                  <tr>
                      <th scope="col" class="py-1 group text-start font-normal focus:outline-none">
                        <div class="py-1 px-2.5 inline-flex items-center border border-transparent text-sm text-gray-500 rounded-md ">
                          ID
                            <path class="hs-datatable-ordering-desc:text-blue-600" d="m7 15 5 5 5-5"></path>
                            <path class="hs-datatable-ordering-asc:text-blue-600" d="m7 9 5-5 5 5"></path>
                          </svg>
                        </div>
                      </th>

                    <th scope="col" class="py-1 group text-start font-normal focus:outline-none">
                      <div class="py-1 px-2.5 inline-flex items-center border border-transparent text-sm text-gray-500 rounded-md">
                        Product Name
                          <path class="hs-datatable-ordering-desc:text-blue-600" d="m7 15 5 5 5-5"></path>
                          <path class="hs-datatable-ordering-asc:text-blue-600" d="m7 9 5-5 5 5"></path>
                        </svg>
                      </div>
                    </th>
      
      
                    <th scope="col" class="py-1 group text-start font-normal focus:outline-none">
                      <div class="py-1 px-2.5 inline-flex items-center border border-transparent text-sm text-gray-500 rounded-md">
                        Price
                          <path class="hs-datatable-ordering-desc:text-blue-600" d="m7 15 5 5 5-5"></path>
                          <path class="hs-datatable-ordering-asc:text-blue-600" d="m7 9 5-5 5 5"></path>
                        </svg>
                      </div>
                    </th>
      
                    </tr>
                </thead>
      
                <tbody class="divide-y divide-gray-200">
                

                @foreach ($products as $product)
                <tr>
                    <td class="p-3 whitespace-nowrap text-sm text-gray-800">{{ $product->id }}</td>
                    <td class="p-3 whitespace-nowrap text-sm font-medium text-gray-800">{{ $product->product }}</td>
                    <td class="p-3 whitespace-nowrap text-sm text-gray-800">${{ $product->price }}</td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      
        
      </div>
</body>
</html>