# toc-helper
<center>
    <img src="./images/toc.png" title="toc-helper" alt="toc-helper">
</center>  

演示站点:  <a href="http://www.itlangzi.com/toc-helper" title="TocHelper演示站点" target="_blank">http://www.itlangzi.com/toc-helper</a>   
## 一、 简介
`TocHelper` 是一款给文章自动生成目录及侧边栏目录滚动特效的插件  
**特点**  
- jQuery Free  
- 方便、灵活、高度定制化  
- 自动退级  
- `Hash` 定位  
- 目录跟随 `Body / div` 滚动  

## 二、 使用  
### 2.1  浏览器  
2.1.1 引入css和js
```html
<link href="css/toc-helper.min.css" rel="stylesheet" />
<script src="js/toc-helper.min.js"></script>
```  
2.1.2 文章内容添加 `data` 属性，值指向目录元素： `data-toc="#toc"`  
```html
<div data-toc="#toc"> </div>
```  
**注意：** `#toc` 选择器对应的目录元素必须存在  
```html
<div id="toc"> </div>
```  
2.1.3 目录已经存在, 调用 `reload()` 方法
```javascript
new TocHelper().reload();
```  
2.1.4 目录若不存在, 调用 `reset()` 方法，自动创建目录    
```javascript
new TocHelper().reset();
```  
### 2.2  使用 `Webpack`, `Browserify`, `Gulp`, `Rollup` 等构建工具   
2.2.1 使用 `npm` 安装 `TocHelper`  
`npm install toc-helper --save`  OR  `yarn add toc-helper`  
2.2.2 使用 `require` 引入 
```javascript
require('toc-helper/css/toc-helper.min.css')
const TocHelper = require('toc-helper')
```  
2.2.3 使用 `import` 引入  
```javascript
import 'toc-helper/css/toc-helper.min.css'
import TocHelper from 'toc-helper'
```  
2.2.4 简单应用  
```javascript
new TocHelper().reload()
```  

## 三、API  
### `TocHelper([selector,options])`  
> 构造器方法, 只能通过 `new` 创建实例  

**selector**  
类型：`string | HTMLElement | Object `  
默认值： `无`  
> `selector` 若为字符串，则必须是选择器，切可以通过该选择器获取相应的元素，否则无效  
> `selector` 若为 `Object` ，则 `options = selector` 第二个参数无效  

**options**  
类型：` Object `  
默认值： `{}`   
> 合并初始的 `options` 参数，并重新 `load`; 比如 `class` 样式发生改变; `megre` 之后需要调用 `reload` 方法  

### reload()  
> 无参  

实例化以及重新 `megre` 之后需要调用该方法  
>实例化后若目录已经存在则调用该方法，若不存在则调用 `reset` 方法，生成目录会自动调用该方法  

### reset()  
> 无参  

目录不存在或需要重新生成目录使用该方法  

## 四、配置
### `options `  
#### 1. `dom`  
> 文章内容 `Dom` 元素， 选择器或 `HTMLElement` 类型的 `Dom` 元素  

类型：`string | HTMLElement`  
默认值：`*[data-toc]`  

### 2. `classNames`
`class` 选择器名称  

#### 2.1 `toc`  
> 目录元素的 `class` 选择器名称  

类型：`string`  
默认值：`toc`  

#### 2.2 `fxied`  
> 目录元素 `position=fixed` 的 `class` 选择器名称 

类型：`string`  
默认值：`toc-fixed`  

#### 2.3 `brand`  
> `目录` 字的 `class` 选择器名称

类型：`string`  
默认值：`toc-brand`  

#### 2.4 `navbar`  
> 目录菜单 `class` 选择器名称

类型：`string`  
默认值：`toc-navbar`  

#### 2.5 `hightlight`  
> 激活高亮/鼠标悬停高亮的 `class` 选择器名称

类型：`string`  
默认值：`toc-hightlight`  

#### 2.6 `nav`  
> 菜单父级节点`class`选择器名称

类型：`string`  
默认值：`toc-nav`  

#### 2.7 `link`  
> 菜单项`class`选择器名称

类型：`string`  
默认值：`toc-link`  

#### 2.8 `active`  
> 菜单项激活后的`class`选择器名称

类型：`string`  
默认值：`active`  

#### 2.9 `marginLeft1`  
> 二级标题偏移的`class`选择器名称

类型：`string`  
默认值：`ml-1`  

#### 2.10 `marginLeft1`  
> 二级标题偏移的`class`选择器名称

类型：`string`  
默认值：`ml-1`  

#### 2.11 `marginLeft2`  
> 三级标题偏移的`class`选择器名称

类型：`string`  
默认值：`ml-2`  

#### 2.12 `marginLeft3`  
> 四级标题偏移的`class`选择器名称

类型：`string`  
默认值：`ml-3`  

#### 2.13 `marginLeft4`  
> 五级标题偏移的`class`选择器名称

类型：`string`  
默认值：`ml-4`  

#### 2.14 `marginLeft5`  
> 六级标题偏移的`class`选择器名称

类型：`string`  
默认值：`ml-5`  

#### ~~2.15 `marginLeft6`~~
> ~~暂无使用~~  

### 3. `hightlight`  
> 是否高亮显示  

类型：` Boolean `  
默认值：`true`  

### 4. `brand`  
> 目录文本  

类型：` string `  
默认值：`目录`  

### 5. `shadow`  
> 目录阴影   

类型：` string | false `  
默认值：`shadow`  
> 若为`string` ，则提供阴影的样式`class`选择器名称,` false`表示禁用阴影

### 6. `idPrefix`  
> 生成`ID`选择器的前缀  

类型：`string`  
默认值：`toc-heading-`  
> 后缀由数字组成  

### 7. `offsetBody`  
> 内容父级定位元素，该元素必须存在`position`属性，切`position`的值不等于`static`, 否则此值等于`body`   

类型：`string | HTMLElement`  
默认值：`document.body`  
> 为`string`类型时，必须是选择器；无论是`string`类型，还是`HTMLElement`类型，都必须有`position`属性，切`position`的值不等于`static`，否则此值等于`body`  

### 8. `topFixed`  
> 不使用或设置目录`fixed`定位   

类型：`false | Object`  
默认值：`如下`  
> `false`表示不使用`fixed`定位；`Object`如下：  

#### 8.1 `top`  
> 目录距离文档顶部的偏移量  

类型： `Number`  
默认值：`24`  

#### 8.2 `left`  
> 目录距离文档左侧的偏移量  

类型： `Number`  
默认值：`无`  

### 9 `maxDepth`  
> 目录最大层级  

类型： `Number`  
默认值：`6`  
> 层级最大为`6` ，最小为`1`，其他值无效

### 10 `autoScroll`  
> 自动添加滚动条  

类型： `Boolean`  
默认值：`true`  
>若 `autoScroll=true` 需满足以下条件：
>- 目录高度要大于可视高度 
>- `tocFixed` 不等于 `false`

 ## 五、示例`options`全部配置信息  
 ```javascript
 {
    dom: '*[data-toc]', // 文章内容元素 选择器 或 HTMLElement
    classNames: {       // class选择器
        toc: 'toc',
        fxied: 'toc-fixed',
        brand: 'toc-brand',
        navbar: 'toc-navbar',
        hightlight: 'toc-hightlight',
        nav: 'toc-nav',
        link: 'toc-link',
        active: 'active',
        marginLeft1: 'ml-1',
        marginLeft2: 'ml-2',
        marginLeft3: 'ml-3',
        marginLeft4: 'ml-4',
        marginLeft5: 'ml-5',
        marginLeft6: 'ml-6'
    },
    hightlight: true,
    brand: '目录',
    shadow: 'shadow',
    idPrefix: 'toc-heading-',
    offsetBody: document.body,
    tocFixed: {
        top: 24,
        left: 0
    },
    maxDepth: 6,
    autoScroll: true
}
 ```  

# 注意：
使用锚点 / `Hash`定位时，若存在头部使用了`fixed`或`absolute`定位，会出现定位没达到预期效果; 可将所有的标题`padding-top`等于头部的高, `margin-top`等于头部高的相反值，这样可以解决定位不准切不会影响布局；

**示例代码如下:**  
```css
*[data-toc] h1,
*[data-toc] h2,
*[data-toc] h3,
*[data-toc] h4,
*[data-toc] h5,
*[data-toc] h6 {
    margin-top: -83px;
    padding-top: 83px;
}
```  
# 即将支持的功能  
- ~~目录自动添加滚动条 已实现~~
- ~~实现内容->目录联动滚动 已实现~~
- 自动折叠/展开
- 支持横向目录
- 同步高亮文章中的标题

